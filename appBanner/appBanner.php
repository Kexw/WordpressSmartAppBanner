<?php
   /*
   Plugin Name: App Banner
   Plugin URI: http://www.attractivesolutions.co.uk/smart-app-banner-plugin/
   Description: This plugin provide easiest way to add smart app banner to your website. This plugin provide an easy way to change styling of the Smart App Banner , So you can easily change colours and different setting also can preview it before finalising.
   Version: 1.0
   Author: Mr. Asjad Tariq
   Author URI: http://www.attractivesolutions.co.uk
   License: GPL2
   */
   include "dynamic.css.php";

/*Checking if these option  names are already available incase of early installation and setting initial values*/
  $thumbPath= plugins_url('appBanner/images/sample.png');
  if( !get_option( 'abp_ios_application_id' ))update_option('abp_ios_application_id',"544007664");
  if( !get_option( 'abp_android_application_link' ) )update_option('abp_android_application_link',"com.google.android.youtube");
  if( !get_option( 'abp_android_application_thumb' ))update_option('abp_android_application_thumb',$thumbPath);
  if( !get_option( 'abp_android_banner_height' ) )update_option('abp_android_banner_height',"75");
  if( !get_option( 'abp_android_banner_fontcolor' ) )update_option('abp_android_banner_fontcolor',"#BAE268");
  if( !get_option( 'abp_android_banner_color' ) )update_option('abp_android_banner_color',"#3d3d3d");
	if( !get_option( 'abp_android_banner_topbar' ) )update_option('abp_android_banner_topbar',"#88B131");
	if( !get_option( 'abp_android_name_color' ) ) update_option('abp_android_name_color',"#FFFFFF");
	if( !get_option( 'abp_android_button_fontcolor' ) ) update_option('abp_android_button_fontcolor',"#FFFFFF");
	if( !get_option( 'abp_android_desc_color' ) ) update_option('abp_android_desc_color',"#cccccc");
	if( !get_option( 'abp_android_button_bgcolor' ) )update_option('abp_android_button_bgcolor',"#b20000");
	if( !get_option( 'abp_android_button_border' ) )update_option('abp_android_button_border',"#f20031");
	if( !get_option( 'abp_android_app_name' ) )update_option('abp_android_app_name',"My App");
	if( !get_option( 'abp_android_app_descripton' ) )update_option('abp_android_app_descripton',"My Application");
	if( !get_option( 'abp_android_app_price' ) )update_option('abp_android_app_price',"0");
  if( !get_option( 'abp_android_days_hidden' ) )update_option('abp_android_days_hidden',"0");
  if( !get_option( 'abp_android_days_reminder' ) )update_option('abp_android_days_reminder',"10");


function footerScript()
{
  $appPrice= "";
  $daysHidden=get_option('abp_android_days_hidden');
  $daysReminder=get_option('abp_android_days_reminder');
  $appName=get_option( 'abp_android_app_name' );
  if(get_option( 'abp_android_app_price' )==0)
  $appPrice="Free";
  else
  $appPrice= "£ ". get_option( 'abp_android_app_price' );
   $jsPath=plugins_url('appBanner/jquery.smartbanner.js');
   $footerScript="";
   $footerScript.=' <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script src='.$jsPath.'></script>
    <script type="text/javascript">
    $(function () { $.smartbanner({ daysHidden: '.$daysHidden.', daysReminder: '.$daysReminder.', title:"'.$appName.'",price:"'.$appPrice.'"}) })
    </script>';
    echo $footerScript;
   }

   /*Below function to add code in Header */

	function smartBannerLoad() {
  $description= get_option( 'abp_android_app_descripton' );
	$cssPath=plugins_url('appBanner/mystyle.php');
	$imagePath=get_option( 'abp_android_application_thumb' );
  $androidAppLink= get_option('abp_android_application_link');
  $iosAppID= get_option('abp_ios_application_id');
	$mystring="";
	$mystring.= $mystring .'<meta name="author" content="'.$description.'">
	<meta name="apple-itunes-app"  content="app-id='.$iosAppID.'">
	<meta name="google-play-app" content="app-id='.$androidAppLink.'">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href='.$cssPath.' type="text/css" media="screen">
	<meta name="msapplication-TileImage" content='.$imagePath.' />';
	echo $mystring;
	}

add_action('wp_head', 'smartBannerLoad');
add_action( 'wp_enqueue_scripts', 'my_script' );
add_action('wp_footer','footerScript');
  add_action('wp_head', 'myStyles', 100);

/**
 * Register a custom menu page.
 */

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'Smart App Banner Settings', 'textdomain' ),
        'Smart Banner',
        'manage_options',
        'appBanner/settings.php',
        '',
        plugins_url( 'appBanner/images/setting.png' ),
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

/**
 * Display a custom menu page
 */
function my_custom_menu_page(){
    esc_html_e( 'Admin Settings', 'textdomain' );
}

?>
