<?php
/*
Plugin Name: HMS Schema Widget
Plugin URI:  https://github.com/michealengland/hms-business-schema/archive/master.zip
Description: Easily add a schema business address to you site.
Version:     1.0.0
Author:      Micheal England
Author URI:  http://michealengland.com
Text Domain: hms-schema-widget
Domain Path: /languages
License:     GPL2

HMS Schema Widget is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

HMS Email Signature is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with HMS Schema Widget. If not, see https://www.gnu.org/licenses/licenses.html.
*/

defined( 'ABSPATH' ) || exit;

// Get Widget
require_once( plugin_dir_path( __FILE__ ) . 'widget.php' );


//Plugin Updates
$this_file = __FILE__;
$update_check = "https://github.com/michealengland/hms-business-schema/archive/master.zip";
require_once('hms-updates.php');
