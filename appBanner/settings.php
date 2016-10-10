
<?php
/* Below file have styles and methods in it*/
include "methods.php";
 	/*
   Below code is to check if form is submitted with some value and then retrive the data save in wp_options table
   */
   if ($_SERVER["REQUEST_METHOD"] == "POST") $errorMessage="";
$app_price_value = (int)$_POST['appPrice'];
$app_hidden_days_value= (int)$_POST['daysHidden'];
$app_reminder_days_value= (int)$_POST['daysReminder'];
//if($zipcodeInt==0) echo "its 0"; else if($zipcodeInt<0) echo "Less thank 0"; else echo "greater than 0";
if (!empty($_POST['iOSApp'])) update_option('abp_ios_application_id',$_POST['iOSApp']);
if (!empty($_POST['androidApp'])) update_option('abp_android_application_link',$_POST['androidApp']);
if (!empty($_POST['image_url'])) update_option('abp_android_application_thumb',$_POST['image_url']);
if (!empty($_POST['androidHeight']) && $_POST['androidHeight'] < 130 && $_POST['androidHeight'] > 71  )
update_option('abp_android_banner_height',$_POST['androidHeight']);
else
$errorMessage.= $errorMessage ."*Banner Height Range (72 - 130 )<br>";
if (!empty($_POST['appPrice']) && $app_price_value <0  )
$errorMessage.= $errorMessage ."*Price Less Than 0.<br>";
else
  update_option('abp_android_app_price',$app_price_value);
if(!empty($_POST['daysHidden']) && $app_hidden_days_value < 0 )
$errorMessage= $errorMessage ."*Days Hidden Less Than 0<br>";
else
update_option('abp_android_days_hidden',$app_hidden_days_value);
if (!empty($_POST['daysReminder']) && $app_reminder_days_value < 0 )
$errorMessage= $errorMessage ."*Days Reminder Less Than 1<br>";
else
update_option('abp_android_days_reminder',$app_reminder_days_value);
if (!empty($_POST['appName'])) update_option('abp_android_app_name',$_POST['appName']);
if (!empty($_POST['appDescription'])) update_option('abp_android_app_descripton',$_POST['appDescription']);
if (!empty($_POST['bgColor'])&& validateHexColor($_POST['bgColor'])==true)
update_option('abp_android_button_bgcolor',$_POST['bgColor']);
else
$errorMessage= $errorMessage ."*Banner Background Color HexCode.<br>";
if (!empty($_POST['fontColor'])&& validateHexColor($_POST['fontColor'])==true)
update_option('abp_android_button_fontcolor',$_POST['fontColor']);
else
$errorMessage= $errorMessage ."*Button Text Color HexCode.<br> ";
if (!empty($_POST['bannerColor'])&& validateHexColor($_POST['bannerColor'])==true)
update_option('abp_android_banner_color',$_POST['bannerColor']);
else
$errorMessage= $errorMessage ."*Banner Color HexCode.<br>";
if (!empty($_POST['bannerTopbarColor'])&& validateHexColor($_POST['bannerTopbarColor'])==true)
update_option('abp_android_banner_topbar',$_POST['bannerTopbarColor']);
else
$errorMessage= $errorMessage ."*Topbar Color HexCode.<br>";
if (!empty($_POST['nameColor'])&& validateHexColor($_POST['nameColor'])==true)
update_option('abp_android_name_color',$_POST['nameColor']);
else
$errorMessage= $errorMessage ."*Application Name Color HexCode.<br>";
if (!empty($_POST['descColor'])&& validateHexColor($_POST['descColor'])==true)
update_option('abp_android_desc_color',$_POST['descColor']);
else
$errorMessage= $errorMessage ."*Application Description Color.<br>";
if (!empty($_POST['buttonBorderColor']) && validateHexColor($_POST['buttonBorderColor'])==true)
update_option('abp_android_button_border',$_POST['buttonBorderColor']);
else
$errorMessage= $errorMessage ."*Button Border Color HexCode.<br>";
/* End of Validation Code*/

// jQuery
wp_enqueue_script('jquery');
// enqueue the Media Uploader script
wp_enqueue_media();
// UPLOAD ENGINE
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

?>
<!-- Setting Form !-->
  <h1>Settings</h1>
  <form method="post" action=""  >
  <table cellspacing="0" width="80%" > <!--1st Table Started !-->
      <tr height="5px" >
        <td></td>
        <td style="background:<?php echo get_option('abp_android_banner_topbar'); ?>">
        </td>
      </tr>
      <tr height="<?php echo get_option('abp_android_banner_height')?>px">
        <td style="<?php echo $style6; ?>">
        Smart App Banner Preview
        </td>
        <td style="<?php echo $style1; ?>" >
            <table cellspacing="0"> <!-- Second Table Started !-->
            <tr v-align="top">
            <td style=" width:15%; text-align:center;  vertical-align:top;" >
            <img src=" <?php echo get_option('abp_android_application_thumb'); ?>" width="57px" height="57px" />
            </td>
            <td style=" width:45%; vertical-align:top;"	>
            <div style="<?php echo $style2; ?>">
            <?php
            echo get_option('abp_android_app_name');
            ?>
            </div>
            <div style ="<?php echo $style3; ?>">
            <?php
            echo get_option('abp_android_app_descripton');
            ?>
            <br>
            <?php
            if(get_option('abp_android_app_price')==0)
            echo "Free";
            else
            echo "£ ".get_option('abp_android_app_price');
            ?> - In Google Play
            </div
            </td>
            <td style=" width:25%; vertical-align:center; text-align:right">
            <button style="<?php echo $style4; ?>" >
            <div style="<?php echo $style5; ?>">VIEW</div>
            </button>
            </td>
            </tr>
            </table> <!-- 1st Table Ends !-->
          </td>
    </tr>
  </table><!-- Second Table Ends !-->
  <table  class="widefat fixed">
      <tr valign="top">
          <th scope="row">iOS Application ID:
          <p class="description"><b>ex : 544007664<b></p>
           </th>
          <td><input type="text" name="iOSApp" value="<?php echo get_option( 'abp_ios_application_id' ); ?>"  >
          </td>
          <td colspan="2" align="center">
          <?php if (($_SERVER["REQUEST_METHOD"] == "POST") && $errorMessage!=""){?><div style="color:red;">Not Valid Entries:<br>
          <?php echo $errorMessage; } ?></div>
          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Android Application Link:
          <p class="description"><b>ex : com.google.android<b></p>
          </th>
          <td>
          <input type="text" name="androidApp" value="<?php echo get_option( 'abp_android_application_link' ); ?>"/>
          </td>
          <th scope="row">Application Price:
            <p class="description"><b>ex : 0.50 or 0 for Free<b></p>
            </th>
          <td><input type="text" name="appPrice" value="<?php echo get_option( 'abp_android_app_price' ); ?>"/>

          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Application Name:</th>
          <td><input type="text" name="appName" value="<?php echo get_option( 'abp_android_app_name ' ); ?>"/></td>
          <th scope="row">Application Description:</th>
          <td>
          <input type="text" name="appDescription" value="<?php echo get_option( 'abp_android_app_descripton' ); ?>"/>
          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Days Hidden:
          <p class="description"><b>Hide Banner Once Button is Clicked</b></p>
          </th>
          <td><input type="text" name="daysHidden" value="<?php echo get_option( 'abp_android_days_hidden ' ); ?>"/></td>
          <th scope="row">Days Reminder:
          <p class="description"><b>Hide Banner, Once View Button is Clicked</b></p>
          </th>
          <td>
          <input type="text" name="daysReminder" value="<?php echo get_option( 'abp_android_days_reminder' ); ?>"/>
          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Banner Bg Colour
          <p class="description"><b>ex : #3d3d3d (Valid Hexcolor)<b></p>
          </th>
          <td>
          <input type="text" name="bannerColor" value="<?php echo get_option( 'abp_android_banner_color' ); ?>"/>
          </td>
          <th scope="row">Banner Height
          <p class="description"><b>ex : 78(Height Range 72px-130px)<b></p>
          </th>
          <td>
          <input type="text" name="androidHeight" value="<?php echo get_option( 'abp_android_banner_height' ); ?>"/></td>
      </tr>
      <tr valign="top">
          <th scope="row">Topbar Colour</th>
          <td>
          <input type="text" name="bannerTopbarColor" value="<?php echo get_option( 'abp_android_banner_topbar' ); ?>"/>
          </td>
          <th scope="row">App Name Color:</th>
          <td>
          <input type="text" name="nameColor" value="<?php echo get_option( 'abp_android_name_color' ); ?>"/>
          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Description Color</th>
          <td>
          <input type="text" name="descColor" value="<?php echo get_option( 'abp_android_desc_color' ); ?>"/></td>
          <th scope="row">Button BgColor</th>
          <td>
          <input type="text" name="bgColor" value="<?php echo get_option( 'abp_android_button_bgcolor' ); ?>" id="bgColor" />
          </td>
      </tr>
    	<tr valign="top">
      </tr>
      <tr valign="top">
          <th scope="row">Button Border Color</th>
          <td>
          <input type="text" name="buttonBorderColor" value="<?php echo get_option( 'abp_android_button_border' ); ?>"/></td>
          </td>
          <th scope="row">Button Text Color</th>
          <td>
          <input type="text" name="fontColor" value="<?php echo get_option( 'abp_android_button_fontcolor' ); ?>"/>
          </td>
      </tr>
      <tr valign="top">
          <th scope="row">Upload Android App Image:</th>
           <td colspan="3">
        	<input type="text" name="image_url" id="image_url" value="<?php echo get_option( 'abp_android_application_thumb' ); ?>"class="regular-text">
        	<input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
          </td>
    </tr>
  </table>
  <?php submit_button(); ?>
  </form>

  for any support contact me <a href="https://twitter.com/asjadtariq" target="_blank">@asjadtariq</a> or email on info@aasansolutions.co.uk
