<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Google_Analytics
 * @subpackage Simple_Easy_Google_Analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Easy_Google_Analytics
 * @subpackage Simple_Easy_Google_Analytics/admin
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
class Simple_Easy_Google_Analytics_Admin {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     *
     */
    public function sega_admin_menu_setup()
    {
        add_menu_page(__('Simple Easy Google Analytics', 'simple-easy-google-analytics'),
            __('Simple Easy Google Analytics', 'simple-easy-google-analytics'),
            'manage_options', $this->plugin_name,
            array(&$this, 'sega_display_wrapper'));
    }

    /**
     *
     */
    public function sega_display_wrapper()
    {
        $egs_options                           = [];
        $egs_options['sega_google_client_id']   = get_option('sega_google_client_id');
        $egs_options['sega_google_client_code'] = get_option('sega_google_client_code');
        require_once plugin_dir_path(__FILE__).'partials/simple-easy-google-analytics-admin-display.php';
    }

    /**
     *
     * @return boolean
     */
    public function submit_sega_settings()
    {
        if (!wp_verify_nonce(esc_html($_POST['submit_sega_setting_nonce']),
                'submit_sega_setting_action'))
        {
            $this->back();
            return false;
        }
        
        $google_client_code = esc_attr($_POST['sega_client_id']);

        update_option('sega_google_client_id',
            sanitize_text_field($google_client_code));

        update_option('sega_google_client_code',
            stripslashes_deep($_POST['sega_script_code']));

        wp_redirect($this->admin_page_url());
    }

    /**
     *
     * @return type
     */
    public function admin_page_url()
    {
        return admin_url('admin.php?page='.$this->plugin_name);
    }

    /**
     *
     */
    public function back()
    {
        if (wp_get_referer())
        {
            wp_safe_redirect(wp_get_referer());
        } else
        {
            wp_safe_redirect($this->admin_page_url());
        }
    }
}