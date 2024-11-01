<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Google_Analytics
 * @subpackage Simple_Easy_Google_Analytics/admin/partials
 */
?>
<h2>
    <?php _e('Simple Easy Google Analytics', 'simple-easy-google-analytics'); ?>
</h2>

<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h1><?php esc_attr_e('Settings', 'simple-easy-google-analytics'); ?></h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <h2>
                            <span>
                                <?php
                                esc_attr_e('Main Content Header',
                                    'simple-easy-google-analytics');
                                ?>
                            </span>
                        </h2>

                        <div class="inside">
                            <form method="post"  action="admin.php" id="egaform" >
                                <input type="hidden" name="action" value="submit_sega_settings" />
                                <?php
                                wp_nonce_field('submit_sega_setting_action',
                                    'submit_sega_setting_nonce');
                                ?>

                                <table class="form-table">

                                    <tr valign="top">
                                        <td scope="row">
                                            <label for="tablecell">
                                                <?php
                                                esc_html_e('Add Google Analytics Client id.',
                                                    'simple-easy-google-analytics');
                                                ?>
                                            </label>
                                        </td>
                                        <td>
                                            <input type="text" value="<?php echo $egs_options['sega_google_client_id']; ?>" placeholder="<?php
                                            esc_attr_e('Add Client id',
                                                'simple-easy-google-analytics');
                                            ?>" name="sega_client_id" class="regular-text" />
                                            <br>
                                            <p>Or</p>
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <td scope="row">
                                            <label for="tablecell">
                                                <?php
                                                esc_html_e('Add Google Analytics Code',
                                                    'simple-easy-google-analytics');
                                                ?>
                                            </label>
                                        </td>
                                        <td>
                                            <textarea name="sega_script_code" class="regular-text" rows="10"><?php
                                                echo htmlspecialchars($egs_options['sega_google_client_code'],
                                                    ENT_QUOTES, 'UTF-8');
                                                ?></textarea>
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <td colspan="2">
                                            <a href="https://analytics.google.com/" target="_blank">Google Analytics</a>
                                        </td>
                                    </tr>

                                </table>
                                <?php submit_button('Update'); ?>
                            </form>
                        </div>
                        <!-- .inside -->
                    </div>
                    <!-- .postbox -->
                </div>
                <!-- .meta-box-sortables .ui-sortable -->
            </div>
            <!-- post-body-content -->
        </div>
        <!-- #post-body .metabox-holder .columns-2 -->
        <br class="clear">
    </div>
    <!-- #poststuff -->
</div> <!-- .wrap -->