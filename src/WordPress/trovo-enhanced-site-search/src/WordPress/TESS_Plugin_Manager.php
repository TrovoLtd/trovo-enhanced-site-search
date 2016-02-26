<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 22/01/2016
 * Time: 11:38
 */

namespace Trovo\TESS\WordPress;


class TESS_Plugin_Manager {

    function __construct() {
        add_action('admin_menu', array($this, 'trovo_add_to_plugins_menu'));
        add_action('admin_init', array($this, 'trovo_register_settings'));
    }

    function trovo_add_to_plugins_menu() {
        add_plugins_page('Trovo Search Settings', 'Trovo Search Settings', 'manage_options', 'trovo_settings', array($this, 'render_trovo_settings_page'));
    }


    /**
     *  This is where I could refactor everything out into helper classes
     */

    function trovo_register_settings() {

        $this->register_general_search_settings();

        $this->register_google_site_search_settings();

        $this->register_mock_settings();

        //register_setting('trovo-general-search-settings-group', 'trovo_general_search_options', array($this,'trovo_search_sanitize_general_options'));
        //register_setting('trovo-google-site-search-settings-group', 'trovo_google_site_search_options', array($this,'trovo_search_sanitize_google_options'));

    }

    function register_general_search_settings() {

        add_settings_section(
            'trovo_search_general_settings_section',
            'General Search Settings',
            array($this, 'render_general_search_settings'),
            'trovo_settings'
        );

        add_settings_field(
            'trovo_general_select_provider',
            'Selected Provider',
            array($this, 'render_general_select_provider'),
            'trovo_settings',
            'trovo_search_general_settings_section'
        );

        register_setting('trovo_settings', 'trovo_general_select_provider');

    }

    function register_google_site_search_settings() {

        add_settings_section(
            'google_site_search_settings_section',
            'Google Site Search Settings',
            array($this, 'render_google_site_search_settings'),
            'trovo_settings'
        );

        add_settings_field(
            'trovo_google_site_search_account_id',
            'Google Site Search Account Id',
            array($this, 'render_google_site_search_account_id'),
            'trovo_settings',
            'google_site_search_settings_section'
        );

        register_setting('trovo_settings', 'trovo_google_site_search_account_id');

    }

    function register_mock_settings() {

        add_settings_section(
            'mock_search_settings_section',
            'Mock Search Settings',
            array($this, 'render_mock_search_settings'),
            'trovo_settings'
        );

    }

    function render_trovo_settings_page() {

    ?>

        <div class="wrap">

            <h2>Trovo Enchanced Site Search Settings</h2>

            <?php

                $active_tab = isset( $_GET['tab']) ? $_GET['tab'] : 'general_options';

            ?>

            <h2 class="nav-tab-wrapper">
                <a href="?page=trovo_settings&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General settings</a>
                <a href="?page=trovo_settings&tab=google_site_search_options" class="nav-tab <?php echo $active_tab == 'google_site_search_options' ? 'nav-tab-active' : ''; ?>">Google Site Search</a>
                <a href="?page=trovo_settings&tab=mock_options" class="nav-tab <?php echo $active_tab == 'mock_options' ? 'nav-tab-active' : ''; ?>">Mock Search</a>
            </h2>


            <form method="post" action="options.php">

                <?php

                    if($active_tab == 'general_options') {
                        settings_fields('trovo_search_general_settings_section');
                        do_settings_sections('trovo_settings');
                    }
                    elseif($active_tab == 'google_site_search_options') {
                        settings_fields('google_site_search_settings_section');
                        do_settings_sections('trovo_settings');
                    }
                    else {
                        settings_fields('mock_search_settings_section');
                        do_settings_sections('trovo_settings');
                    }

                    submit_button();

                ?>


            </form>

        </div>

    <?php

    }

    function render_general_search_settings() {
        echo '<p>General Settings</p>';
    }

    function render_general_select_provider() {
        echo '<p>Render radio buttons to select the provider with.</p>';
    }


    function render_google_site_search_settings() {

        echo '<p>Google Site Search Settings</p>';

        /* $trovo_google_site_search_options = get_option('trovo_google_site_search_options');

        ?>

        <table class="form-table">

            <tr valign="top">
               <th scope="row">Google Site Search Account Id:</th>
                <td><input type="text" name="trovo_search_options[gss_account_id]" value="<?php echo esc_attr($trovo_google_site_search_options['gss_account_id']) ?>" /></td>
            </tr>

        </table>

        <?php

        */
    }

    function render_google_site_search_account_id() {
        echo '<p>Render the form field for the Google Account Id.</p>';
    }

    function render_mock_search_settings() {
        echo '<p>Mock Search Settings</p>';
    }


    function trovo_search_sanitize_google_options($input) {

        $input['google_site_search_id'] = sanitize_text_field($input['google_site_search_id']);

        return $input;

    }

}