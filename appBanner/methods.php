<?php
function load_wp_media_files()
{
    wp_enqueue_media();
}
/*Function to validate Colour Enter by Users are Valid */

function validateHexColor($color)
{
  if(preg_match('/^#[a-f0-9]{6}$/i', $color)) //hex color is valid
		{
		return true;
		}
    else
    return false;
}


/*Declaring all styles need to be used for preview section*/
$style1="background:".get_option('abp_android_banner_color')." url('data:image/gif;base64,R0lGODlhCAAIAIABAFVVVf///yH5BAEHAAEALAAAAAAIAAgAAAINRG4XudroGJBRsYcxKAA7'); padding: 5px 10px;  width:280px; ";
$style2="font-size:14px; color:".get_option('abp_android_name_color').";line-height: 1.8em; text-align:left;" ;
$style3="font-size:12px; color:".get_option('abp_android_desc_color').";text-align:left; line-height: 1.1em; ";
$style4="width:60px; height:30px; background-color:".get_option( 'abp_android_button_bgcolor' )."; background-image: -webkit-gradient(linear,10 10,10 160%,from(".get_option( 'abp_android_button_bgcolor' )."),to(#fff)); border:3px solid ".get_option('abp_android_button_border');
$style4.=$style4."background-image: -moz-linear-gradient(top,".get_option( 'abp_android_button_bgcolor' ).",#fff);";
$style5= "color:".get_option('abp_android_button_fontcolor')."; font-size:16px;  font-weight: bold; ";
$style6=" font-size: 28px; font-family:Georgia,serif; color:#4E443C; font-variant: small-caps; text-transform: none; font-weight: 100; margin-bottom: 0; text-align:center; ";
?>
<footer>
<script type="text/javascript">
  jQuery(document).ready(function($){
      $('#upload-btn').click(function(e) {
          e.preventDefault();
          var image = wp.media({
              title: 'Upload Image',
              // mutiple: true if you want to upload multiple files at once
              multiple: false
          }).open()
          .on('select', function(e){
              // This will return the selected image from the Media Uploader, the result is an object
              var uploaded_image = image.state().get('selection').first();
              // We convert uploaded_image to a JSON object to make accessing it easier
              // Output to the console uploaded_image
              console.log(uploaded_image);
              var image_url = uploaded_image.toJSON().url;
              // Let's assign the url value to the input field
              $('#image_url').val(image_url);
          });
      });
  });
</script>
</footer>
