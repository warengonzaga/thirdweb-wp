<?php
/**
* Plugin Name: thirdweb WP
* Plugin URI: https://github.com/warengonzaga/thirdweb-wp
* Description: A community WordPress plugin for thirdweb. Turn your WordPress website into Web3 instantly and easily with thirdweb.
* Version: 0.0.1
* Requires at least: 5.2
* Requires PHP:      8.2
* Author:            Waren Gonzaga
* Author URI:        https://warengonzaga.com/
* License:           GPL v3
* License URI:       https://www.gnu.org/licenses/gpl-3.0.html
* Update URI:        thirdweb-wp
* Text Domain:       thirdweb-wp
* Domain Path:       /languages
*/

/**
* thirdweb WP
*/

// prevent direct access
defined( 'ABSPATH' ) or die( 'Restricted Access!' );

/**
 * The [twcontractread] shortcode.
 *
 * Read contract function
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @param string $content Shortcode content. Default null.
 * @param string $tag     Shortcode tag (name). Default empty.
 * @return string Shortcode output.
 */
function thirdweb_contract_read( $atts = [], $content = null, $tag = '') {

    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );

    // override default attributes with user attributes
    $twcontractread_atts = shortcode_atts(
        array(
            'address' => get_option('default_contract_address', '0x26959366660AC1273C446bc884B3059fAeF5fD94'),
            'chain' => get_option('default_chain', '84531'),
            'function' => 'name',
        ), $atts, $tag
    );

    // Split function attribute into function name and arguments
    $function_parts = explode(':', $twcontractread_atts['function']);
    $function_name = $function_parts[0];
    $function_args = isset($function_parts[1]) ? explode(',', $function_parts[1]) : array();

    // Call the REST API
    $engine_api_endpoint = get_option('engine_api_endpoint');
    if (empty($engine_api_endpoint)) {
        return '<span style="color:red;">Error: No engine API endpoint found. Please set the engine API endpoint in the plugin settings.</span>';
    }

    // Build endpoint URL with function name and arguments
    // Add trailing slash if not present
    if (substr($engine_api_endpoint, -1) !== '/') {
        $engine_api_endpoint .= '/';
    }

    // Build the URL
    $url = $engine_api_endpoint . 'contract/' . $twcontractread_atts['chain'] . '/' . $twcontractread_atts['address'] . '/read?functionName=' . $function_name;

    // Add function arguments to the URL if they exist
    if (!empty($function_args)) {
        $url .= '&args=' . implode(',', $function_args);
    }

    // Add access token to the request
    $engine_access_token = get_option('engine_access_token');
    if (empty($engine_access_token)) {
        return '<span style="color:red;">Error: No engine access token found. Please set the engine access token in the plugin settings.</span>';
    }
    $args = array(
        'headers' => array(
            'Authorization' => 'Bearer ' . $engine_access_token,
            'Content-Type' => 'application/json'
        )
    );

    $response = wp_remote_get( $url, $args );
    $result = '';
    
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        echo "<script>console.error('Error: " . esc_js($error_message) . "');</script>";
    } else {
        if ( is_array( $response ) && ! is_wp_error( $response ) ) {
            $body = $response['body'];
            $data = json_decode( $body );
            if (isset($data->result)) {
                $result = '<span>' . esc_html( $data->result ) . '</span>';
            } else {
                $result = '<span style="color:red;">Error: No result found in the response.</span>';
            }
        }

    }
    // return output
    return $result;
}

/**
 * Settings page for the plugin.
 */
function thirdweb_admin_menu() {
    add_options_page(
        'thirdweb WP Settings', // page title
        'thirdweb WP', // page title
        'manage_options', // capability
        'thirdweb-wp', // slug
        'thirdweb_wp_options' // callback
    );
}

function thirdweb_wp_settings() {
    register_setting('thirdweb-wp-settings-group', 'engine_api_endpoint');
    register_setting('thirdweb-wp-settings-group', 'engine_access_token');
    register_setting('thirdweb-wp-settings-group', 'default_contract_address');
    register_setting('thirdweb-wp-settings-group', 'default_chain');
}

function thirdweb_wp_options() {
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }
    ?>
    <div class="wrap">
        <h2 style="display: flex; align-items: center;font-weight: bold">
            <img src="<?php echo plugins_url('assets/thirdweb.png', __FILE__); ?>" alt="thirdweb Logo" style="vertical-align: middle; margin-right: 10px; width: auto; height: 24px;">
            thirdweb WP Settings<span style="font-size: 12px; margin-left: 10px; font-weight: normal">Community Edition</span>
        </h2>

        <form method="post" action="options.php">
            <?php settings_fields('thirdweb-wp-settings-group'); ?>
            <?php do_settings_sections('thirdweb-wp-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Engine URL</th>
                    <td>
                        <input type="text" name="engine_api_endpoint" placeholder="Your Engine URL" value="<?php echo esc_attr(get_option('engine_api_endpoint')); ?>"/>
                        <p style="font-size: 10px; margin-top: 5px;"><i>Note: Please always double check your API URL.</i></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Access Token</th>
                    <td>
                        <input type="text" name="engine_access_token" placeholder="Your Access Token" value="<?php echo esc_attr(get_option('engine_access_token')); ?>"/>
                        <p style="font-size: 10px; margin-top: 5px;"><i>Get your access token from your <a href="https://thirdweb.com/dashboard/engine">Engine dashboard</a>.</i></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Default Contract Address</th>
                    <td>
                        <input type="text" name="default_contract_address" placeholder="0x26959366660AC1273C446bc884B3059fAeF5fD94" value="<?php echo esc_attr(get_option('default_contract_address')); ?>"/>
                        <p style="font-size: 10px; margin-top: 5px;"><i>Get your contract address from your <a href="https://thirdweb.com/dashboard/">dashboard</a>.</i></p>
                </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Default Chain</th>
                    <td>
                        <input type="text" name="default_chain" placeholder="84531" value="<?php echo esc_attr(get_option('default_chain')); ?>"/>
                        <p style="font-size: 10px; margin-top: 5px;"><i>Get your chain ID or chain name from <a href="https://thirdweb.com/chainlist/">here</a>.</i></p>
                    </td>
                </tr>
            </table>
            
            <?php submit_button(); ?>
        </form>
        <hr/>
        <p>Need help? <a href="https://github.com/warengonzaga/thirdweb-wp?tab=readme-ov-file#%EF%B8%8F-usage">Read the documentation</a>.</p>
        <p>Found a bug? <a href="https://github.com/warengonzaga/thirdweb-wp">Let us know.</a></p>
        <p>Contribute to the plugin's development on <a href="https://github.com/warengonzaga/thirdweb-wp">GitHub repository</a>.</p>
    </div>
    <?php
}

/**
* Central location to create all shortcodes.
*/
function thirdweb_shortcodes_init() {
    add_shortcode( 'twcontractread', 'thirdweb_contract_read' ); // [twcontractread address="" chain="" function="tokenURI:0"]
}

add_action( 'init', 'thirdweb_shortcodes_init' );
add_action( 'admin_menu', 'thirdweb_admin_menu' );
add_action( 'admin_init', 'thirdweb_wp_settings' );
