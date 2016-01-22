<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 22/01/2016
 * Time: 11:38
 */

namespace Trovo\TESS\WordPress;


class GSS_Plugin_Manager {

    function __construct() {
        add_action('admin_menu', array($this, 'trovo_add_to_options_menu'));
    }

    function trovo_add_to_options_menu() {

        add_options_page('Trovo Search Settings Page', 'Trovo Search Settings', 'manage_options', 'trovo_settings_menu', array($this, 'trovo_settings_page'));

        add_action('admin_init', array($this, 'trovo_register_settings'));

    }

    function trovo_register_settings() {

        register_setting('trovo-search-settings-group', 'trovo_search_options', array($this,'trovo_search_sanitize_options'));

    }

    function trovo_settings_page() {

    ?>

        <div class="wrap">

            <h2>Trovo Search Settings Page</h2>

            <form method="post" action="options.php">

                <?php settings_fields('trovo-search-settings-group'); ?>
                <?php $trovo_search_options = get_option('trovo_search_options') ?>

                <table class="form-table">

                    <tr valign="top">
                       <th scope="row">Google Site Search Account Id:</th>
                        <td><input type="text" name="trovo_search_options[gss_account_id]" value="<?php echo esc_attr($trovo_search_options['gss_account_id']) ?>" /></td>
                    </tr>

                </table>

                <p class="submit">
                    <input type="submit" class="button-primary" value="Save Changes" />
                </p>

            </form>

        </div>

    <?php

    }

    function trovo_search_sanitize_options($input) {

        $input['google_site_search_id'] = sanitize_text_field($input['google_site_search_id']);

        return $input;

    }

}