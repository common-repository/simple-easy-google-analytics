<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Google_Analytics
 * @subpackage Simple_Easy_Google_Analytics/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Easy_Google_Analytics
 * @subpackage Simple_Easy_Google_Analytics/public
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
class Simple_Easy_Google_Analytics_Public {

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        $array_data   = [];
        $check_sega_id = get_option('sega_google_client_id');
        if ($check_sega_id)
        {
            $array_data['code'] = $this->generate_script_code($check_sega_id);
        } else
        {
            $array_data['code'] = get_option('sega_google_client_code');
        }

        wp_enqueue_script($this->plugin_name,
            plugin_dir_url(__FILE__).'js/simple-easy-google-analytics-public.js',
            array('jquery'), $this->version, true);

        wp_localize_script($this->plugin_name, 'sega_object', $array_data);
    }

    private function generate_script_code($client_id = null)
    {
        return "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');"
            ."ga('create', '$client_id', 'auto');"
            ."ga('send', 'pageview');";
    }
}