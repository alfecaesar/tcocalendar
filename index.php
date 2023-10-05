<?php
/*
Plugin Name: WP Google Calendar
Description: Calendar Plugin connected to Google Calendar API
Version: 1.0.0
Author: Alfe Caesar Lagas
*/

function enqueue_scripts() {
    $google_calendar_id = get_option('google_calendar_id');
    $google_api_key = get_option('google_api_key');
    $time_zone = get_option('time_zone');

    wp_enqueue_style('fullcalendar-css', 'https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css');
    wp_enqueue_style('bootstrap-min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css');
    wp_enqueue_style('calendar-style', plugins_url( '/styles/style.css', __FILE__ ));
    wp_enqueue_script('google-api', 'https://apis.google.com/js/api.js', [], null, true);
    wp_enqueue_script('moment-js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js', [], null, true);
    wp_enqueue_script('fullcalendar-js', 'https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js', [], null, true);
    wp_enqueue_script('fullcalendargcal-js', 'https://cdn.jsdelivr.net/npm/@fullcalendar/google-calendar@6.1.9/index.global.min.js', [], null, true);
    wp_enqueue_script('calendar-script', plugins_url( '/scripts/script.js', __FILE__ ), [], null, true);
    $script_params = array(
        'google_calendar_id' => esc_html($google_calendar_id),
        'google_api_key' => esc_html($google_api_key),
        'time_zone' => esc_html($time_zone)
    );
    wp_localize_script('calendar-script', 'scriptParams', $script_params );
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

function calendar_shortcode() {
    $google_calendar_id = get_option('google_calendar_id');
    $google_api_key = get_option('google_api_key');
    $output  = '<div id="wpcalendar"></div>';

    return $output;
}

add_shortcode('calendar_shortcode', 'calendar_shortcode');



function calendar_settings_page() {
    ?>
    <div class="wrap" id="tco_calendar_wrapper">
        <h2>Google Calendar Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('calendar_settings'); ?>
            <?php do_settings_sections('calendar_settings'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Google Calendar ID:</th>
                    <td><input type="text" name="google_calendar_id" value="<?php echo esc_attr(get_option('google_calendar_id')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Google API Key:</th>
                    <td><input type="text" name="google_api_key" value="<?php echo esc_attr(get_option('google_api_key')); ?>" /></td>
                </tr>
                <tr valign="top">
                    <th scope="row">Timezone: </th>
                    <td>
                        <div class="fld-label">Current Timezone: <strong><?php echo esc_attr(get_option('time_zone')); ?></strong></div>
                        <select name="time_zone">
                            <option value="America/Adak">Adak</option>
                            <option value="America/Anchorage">Anchorage</option>
                            <option value="America/Anguilla">Anguilla</option>
                            <option value="America/Antigua">Antigua</option>
                            <option value="America/Araguaina">Araguaina</option>
                            <option value="America/Argentina/Buenos_Aires">Argentina - Buenos Aires</option>
                            <option value="America/Argentina/Catamarca">Argentina - Catamarca</option>
                            <option value="America/Argentina/Cordoba">Argentina - Cordoba</option>
                            <option value="America/Argentina/Jujuy">Argentina - Jujuy</option>
                            <option value="America/Argentina/La_Rioja">Argentina - La Rioja</option>
                            <option value="America/Argentina/Mendoza">Argentina - Mendoza</option>
                            <option value="America/Argentina/Rio_Gallegos">Argentina - Rio Gallegos</option>
                            <option value="America/Argentina/Salta">Argentina - Salta</option>
                            <option value="America/Argentina/San_Juan">Argentina - San Juan</option>
                            <option value="America/Argentina/San_Luis">Argentina - San Luis</option>
                            <option value="America/Argentina/Tucuman">Argentina - Tucuman</option>
                            <option value="America/Argentina/Ushuaia">Argentina - Ushuaia</option>
                            <option value="America/Aruba">Aruba</option>
                            <option value="America/Asuncion">Asuncion</option>
                            <option value="America/Atikokan">Atikokan</option>
                            <option value="America/Bahia">Bahia</option>
                            <option value="America/Bahia_Banderas">Bahia Banderas</option>
                            <option value="America/Barbados">Barbados</option>
                            <option value="America/Belem">Belem</option>
                            <option value="America/Belize">Belize</option>
                            <option value="America/Blanc-Sablon">Blanc-Sablon</option>
                            <option value="America/Boa_Vista">Boa Vista</option>
                            <option value="America/Bogota">Bogota</option>
                            <option value="America/Boise">Boise</option>
                            <option value="America/Cambridge_Bay">Cambridge Bay</option>
                            <option value="America/Campo_Grande">Campo Grande</option>
                            <option value="America/Cancun">Cancun</option>
                            <option value="America/Caracas">Caracas</option>
                            <option value="America/Cayenne">Cayenne</option>
                            <option value="America/Cayman">Cayman</option>
                            <option value="America/Chicago">Chicago</option>
                            <option value="America/Chihuahua">Chihuahua</option>
                            <option value="America/Costa_Rica">Costa Rica</option>
                            <option value="America/Creston">Creston</option>
                            <option value="America/Cuiaba">Cuiaba</option>
                            <option value="America/Curacao">Curacao</option>
                            <option value="America/Danmarkshavn">Danmarkshavn</option>
                            <option value="America/Dawson">Dawson</option>
                            <option value="America/Dawson_Creek">Dawson Creek</option>
                            <option value="America/Denver">Denver</option>
                            <option value="America/Detroit">Detroit</option>
                            <option value="America/Dominica">Dominica</option>
                            <option value="America/Edmonton">Edmonton</option>
                            <option value="America/Eirunepe">Eirunepe</option>
                            <option value="America/El_Salvador">El Salvador</option>
                            <option value="America/Fortaleza">Fortaleza</option>
                            <option value="America/Fort_Nelson">Fort Nelson</option>
                            <option value="America/Glace_Bay">Glace Bay</option>
                            <option value="America/Godthab">Godthab</option>
                            <option value="America/Goose_Bay">Goose Bay</option>
                            <option value="America/Grand_Turk">Grand Turk</option>
                            <option value="America/Grenada">Grenada</option>
                            <option value="America/Guadeloupe">Guadeloupe</option>
                            <option value="America/Guatemala">Guatemala</option>
                            <option value="America/Guayaquil">Guayaquil</option>
                            <option value="America/Guyana">Guyana</option>
                            <option value="America/Halifax">Halifax</option>
                            <option value="America/Havana">Havana</option>
                            <option value="America/Hermosillo">Hermosillo</option>
                            <option value="America/Indiana/Indianapolis">Indiana - Indianapolis</option>
                            <option value="America/Indiana/Knox">Indiana - Knox</option>
                            <option value="America/Indiana/Marengo">Indiana - Marengo</option>
                            <option value="America/Indiana/Petersburg">Indiana - Petersburg</option>
                            <option value="America/Indiana/Tell_City">Indiana - Tell City</option>
                            <option value="America/Indiana/Vevay">Indiana - Vevay</option>
                            <option value="America/Indiana/Vincennes">Indiana - Vincennes</option>
                            <option value="America/Indiana/Winamac">Indiana - Winamac</option>
                            <option value="America/Inuvik">Inuvik</option>
                            <option value="America/Iqaluit">Iqaluit</option>
                            <option value="America/Jamaica">Jamaica</option>
                            <option value="America/Juneau">Juneau</option>
                            <option value="America/Kentucky/Louisville">Kentucky - Louisville</option>
                            <option value="America/Kentucky/Monticello">Kentucky - Monticello</option>
                            <option value="America/Kralendijk">Kralendijk</option>
                            <option value="America/La_Paz">La Paz</option>
                            <option value="America/Lima">Lima</option>
                            <option value="America/Los_Angeles">Los Angeles</option>
                            <option value="America/Lower_Princes">Lower Princes</option>
                            <option value="America/Maceio">Maceio</option>
                            <option value="America/Managua">Managua</option>
                            <option value="America/Manaus">Manaus</option>
                            <option value="America/Marigot">Marigot</option>
                            <option value="America/Martinique">Martinique</option>
                            <option value="America/Matamoros">Matamoros</option>
                            <option value="America/Mazatlan">Mazatlan</option>
                            <option value="America/Menominee">Menominee</option>
                            <option value="America/Merida">Merida</option>
                            <option value="America/Metlakatla">Metlakatla</option>
                            <option value="America/Mexico_City">Mexico City</option>
                            <option value="America/Miquelon">Miquelon</option>
                            <option value="America/Moncton">Moncton</option>
                            <option value="America/Monterrey">Monterrey</option>
                            <option value="America/Montevideo">Montevideo</option>
                            <option value="America/Montserrat">Montserrat</option>
                            <option value="America/Nassau">Nassau</option>
                            <option value="America/New_York">New York</option>
                            <option value="America/Nipigon">Nipigon</option>
                            <option value="America/Nome">Nome</option>
                            <option value="America/Noronha">Noronha</option>
                            <option value="America/North_Dakota/Beulah">North Dakota - Beulah</option>
                            <option value="America/North_Dakota/Center">North Dakota - Center</option>
                            <option value="America/North_Dakota/New_Salem">North Dakota - New Salem</option>
                            <option value="America/Ojinaga">Ojinaga</option>
                            <option value="America/Panama">Panama</option>
                            <option value="America/Pangnirtung">Pangnirtung</option>
                            <option value="America/Paramaribo">Paramaribo</option>
                            <option value="America/Phoenix">Phoenix</option>
                            <option value="America/Port-au-Prince">Port-au-Prince</option>
                            <option value="America/Port_of_Spain">Port of Spain</option>
                            <option value="America/Porto_Velho">Porto Velho</option>
                            <option value="America/Puerto_Rico">Puerto Rico</option>
                            <option value="America/Punta_Arenas">Punta Arenas</option>
                            <option value="America/Rainy_River">Rainy River</option>
                            <option value="America/Rankin_Inlet">Rankin Inlet</option>
                            <option value="America/Recife">Recife</option>
                            <option value="America/Regina">Regina</option>
                            <option value="America/Resolute">Resolute</option>
                            <option value="America/Rio_Branco">Rio Branco</option>
                            <option value="America/Santarem">Santarem</option>
                            <option value="America/Santiago">Santiago</option>
                            <option value="America/Santo_Domingo">Santo Domingo</option>
                            <option value="America/Sao_Paulo">Sao Paulo</option>
                            <option value="America/Scoresbysund">Scoresbysund</option>
                            <option value="America/Sitka">Sitka</option>
                            <option value="America/St_Barthelemy">St Barthelemy</option>
                            <option value="America/St_Johns">St Johns</option>
                            <option value="America/St_Kitts">St Kitts</option>
                            <option value="America/St_Lucia">St Lucia</option>
                            <option value="America/St_Thomas">St Thomas</option>
                            <option value="America/St_Vincent">St Vincent</option>
                            <option value="America/Swift_Current">Swift Current</option>
                            <option value="America/Tegucigalpa">Tegucigalpa</option>
                            <option value="America/Thule">Thule</option>
                            <option value="America/Thunder_Bay">Thunder Bay</option>
                            <option value="America/Tijuana">Tijuana</option>
                            <option value="America/Toronto">Toronto</option>
                            <option value="America/Tortola">Tortola</option>
                            <option value="America/Vancouver">Vancouver</option>
                            <option value="America/Whitehorse">Whitehorse</option>
                            <option value="America/Winnipeg">Winnipeg</option>
                            <option value="America/Yakutat">Yakutat</option>
                            <option value="America/Yellowknife">Yellowknife</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
            <h3>Guides</h3>
            <hr />
            <h4>Shortcodes:</h4>
            <p>[calendar_shortcode]</p>
            <hr />
            <h4>You must first have a Google Calendar API Key:</h4>
            <ol>
            <li>Go to the <a href="https://console.developers.google.com/">Google Developer Console</a> and create a new project (it might take a second).</li>
            <li>Once in the project, go to <strong>APIs &amp; auth &gt; APIs</strong> on the sidebar.</li>
            <li>Find “Calendar API” in the list and turn it ON.</li>
            <li>On the sidebar, click <strong>APIs &amp; auth &gt; Credentials</strong>.</li>
            <li>In the “Public API access” section, click “Create new Key”.</li>
            <li>Choose “Browser key”.</li>
            <li>If you know what domains will host your calendar, enter them into the box. Otherwise, leave it blank. You can always change it later.</li>
            <li>Your new API key will appear. It might take second or two before it starts working.</li>
            </ol>
            <h4>Make your Google Calendar public:</h4>
            <ol>
            <li>In the Google Calendar interface, locate the “My calendars” area on the left.</li>
            <li>Hover over the calendar you need and click the downward arrow.</li>
            <li>A menu will appear. Click “Share this Calendar”.</li>
            <li>Check “Make this calendar public”.</li>
            <li>Make sure “Share only my free/busy information” is <strong>unchecked</strong>.</li>
            <li>Click “Save”.</li>
            </ol>
            <h4>Obtain your Google Calendar’s ID:</h4>
            <ol>
            <li>In the Google Calendar interface, locate the “My calendars” area on the left.</li>
            <li>Hover over the calendar you need and click the downward arrow.</li>
            <li>A menu will appear. Click “Calendar settings”.</li>
            <li>In the “Calendar Address” section of the screen, you will see your Calendar ID. It will look something like “abcd1234@group.calendar.google.com”.</li>
            </ol>
        </form>
        <style>
            #tco_calendar_wrapper input[type=text],
            #tco_calendar_wrapper select{width: 500px;}
            .fld-label{font-size: 14px;margin-bottom: 10px;}
        </style>
    </div>
    <?php
}

function calendar_add_menu() {
    add_options_page('Google Calendar Settings', 'Google Calendar', 'manage_options', 'calendar', 'calendar_settings_page');
}
add_action('admin_menu', 'calendar_add_menu');

function calendar_register_settings() {
    register_setting('calendar_settings', 'google_calendar_id');
    register_setting('calendar_settings', 'google_api_key');
    register_setting('calendar_settings', 'time_zone');
}
add_action('admin_init', 'calendar_register_settings');