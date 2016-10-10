<?php
// Clearing all data from Databse once uninstall is called
//If uninstall is not called from WordPress, exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) )
{
    exit();
}

delete_option('abp_android_banner_height');
delete_option('abp_android_banner_fontcolor');
delete_option('abp_android_banner_color');
delete_option('abp_android_banner_topbar');
delete_option('abp_android_name_color');
delete_option('abp_android_desc_color');
delete_option('abp_android_button_bgcolor');
delete_option('abp_android_button_border');
delete_option('abp_android_app_name');
delete_option('abp_android_app_descripton');
delete_option('abp_android_app_price');
delete_option('abp_android_days_hidden');
delete_option('abp_android_days_reminder');
delete_option('android_application_link');
delete_option('abp_android_application_thumb');
delete_option('abp_android_button_fontcolor');
delete_option('abp_android_application_link');
delete_option('abp_ios_application_id');
?>
