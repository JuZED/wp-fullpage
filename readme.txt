=== WP FullPage ===
Contributors: Julien Zerbib
Tags: fullpage, fullscreen, scrolling, theme, parallax
Requires at least: 3.5
Tested up to: 4.0
Stable tag: 3.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Change your WordPress website to a Fullscreen Scrolling one using fullPage.js

== Description ==
Wp Fullpage integrates the power of [fullPage.js](https://github.com/alvarotrigo/fullPage.js "fullPage.js") into your WordPress website.

= Examples =
Browse some [examples](http://wp-fullpage.juzed.fr/ "WP FullPage on JuZED.fr").

= New Features =
1. New Parallax effect. When CSS3 mode is deactivated and Parallax activated, FullPage and Sections has a background Parallax effect. 
2. Now, in CSS3 mode, you can chose a transition effect by FullPage (vertical) and Section (horizontal) independently. 
3. Many js and CSS3 transition effects available. 
4. You can now disable FullPage vertical Scrolling for smaller screens modifying "Responsive" value.
5. UI improvments. 
6. Pages can now be used as FullPages.
7. Backgrounds are now displayed once loaded with a fade in effect.
8. You can found some sample code into "template" folder.
9. Fullpage are now available as front page.

= How to use =
1. Create Fullpage Sections and Slides and integrates them into a Fullpage or a Page.
2. Replace Sections and Slides by a list of any type of post.
3. Setup your Fullpage with many options from [fullPage.js](https://github.com/alvarotrigo/fullPage.js "fullPage.js").
4. Setup background colors, content position and many more.
5. Add a featured image to your section, slide or post, and it will appear as background of the section or the slide.

= Customization =
1. Customize FullPage templates and functionalities by copying the contents of "/wp-content/plugins/wp-fullpage/templates/" into "/wp-content/themes/YOURTHEME/wp-fullpage/".
2. Uncomment line 39 of "layout/header.php" to see a complete menu with slides under sections.
3. Many hook filters and actions are available too.

= Documentation =
Read the [full documentation](http://docs.juzed.fr/wp-fullpage "WP FullPage Documentation")

[Contact me](http://www.juzed.fr/en/contact-form/ "Contact me") if you want to know how to customise WP FullPage.

== Installation ==
1. Upload "wp-fullpage.zip" to the "/wp-content/plugins/" directory.
2. Unzip archive.
3. Activate the plugin through the "Plugins" menu in WordPress.
4. Go to "Settings/Wp FullPage" for default settings.

== Upgrade Notice ==
Deactivate than reactivate the plugin after upgrade to refresh permalinks.

== Changelog ==
= 3.0 =
*   New parallax effect
= 2.2 =
*   New options added
= 2.1 =
*   UI improvments + fullPage.js upgrade to 2.4.3 
= 2.0.1 =
*   Bug fixes
= 2.0 =
*   FullPage options added to Pages
= 1.5 =
*   fullPage.js Upgrade to 2.4.1 and bug fixes in Back Office
= 1.4 =
*   Removing of feature of empty post type in permalink for fullpage post type. 
= 1.3 =
*   Remove fullpage post-type in permalink and add fullpage to the front page dropdown. 
= 1.2 =
*   Condition updated. 
= 1.1 =
*   Dropdown Pages Filter to add Fullpage Post Type pages to "Settings / Reading" Page. 
= 1.0 =
*   Initial release. 
