=== WP Fullpage ===
Contributors: Julien Zerbib
Tags: menu, breadcrumb, context, theme, widget
Requires at least: 3.5
Tested up to: 3.9
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add some Contextual Navigation Menu Features.

== Description ==
Add some Contextual Navigation Menu Features.

Provide contextual menus as Navigation Menu, Breadcrumb Navigation Menu and Navigation Submenu Widget.

What is a contextual menu?
It's simple: it follows the current item as much as possible.

For example, you have a category entry in your primary menu. But when you read a post of this category, your menu has no selected items. Your entry is like orphan.
With WP Fullpage, no more orphans entry. Taxonomies (categories and tags), pages, posts (custom types too) are linked to there parents if they are in the menu.

And if the parent is not in the menu? There still have a solution! You can add to each taxonomy (category and tag), page, post (custom types too) a parent menu item.

With the same mecanism, your WP Fullpage Breadcrumb won't be blank anymore, it will follow as much as possible your menus structure and is fully customisable.

The Contextual Nav Submenu Widget displays a contextual menu related to the highest parent of the current item.

Features:

1. Add a parent menu item to each taxonomy (category and tag), page, post (custom types too) individualy or with bulk actions
2. Customise your breadcrumb: titles, image of the home link, menus order 
3. French and English support
4. [Polylang](http://wordpress.org/plugins/polylang/ "Polylang on WordPress") compatibility (breadcrumb is fully multilingual)
5. Multisite compatibility
6. WP Fullpages are accessible
7. WP Fullpages are ready to use with all themes. The plugin does not provide any predefined themes.

Visit [JuZED.fr](http://www.juzed.fr/en/plugins/contextual-nav-menu/ "WP Fullpage on JuZED.fr") for examples.

Contact me if you want to know how to customise your menus.

== Installation ==
1. Upload "contextual-nav-menu.zip" to the "/wp-content/plugins/" directory.
2. Unzip archive.
3. Activate the plugin through the "Plugins" menu in WordPress.
4. Place for example "contextual_nav_menu( array( 'theme_location' => 'primary' ) );" in your templates to display a WP Fullpage for the primary theme location (see [WordPress documentation](http://codex.wordpress.org/Function_Reference/wp_nav_menu#Usage_.28Showing_Default_Values.29) for more details, arguments are the same).
5. Place "contextual_nav_menu_breadcrumb();" in your templates to display a WP Fullpage breadcrumb.

For a full customisation of the breadcrumb, "contextual_nav_menu_breadcrumb" accepts an array as param.

= These are all accepted keys and there possible values: =
*   menu_class - CSS class to use for the ol element which forms the menu. Defaults to 'breadcrumb'
*   container - Whether to wrap the ol, and what to wrap it with. Defaults to 'nav'
*   container_role - The role of the container. Defaults to 'navigation'
*   container_class - The class that is applied to the container. Defaults to 'nav-menu-breadcrumb'
*   container_id - The ID that is applied to the container. Defaults to blank
*   fallback_cb - If the menu doesn't exists, a callback function will fire. Defaults to 'wp_nav_menu'. Set to false for no fallback
*   before - Text before the link text
*   after - Text after the link text
*   link_before - Text before the link
*   link_after - Text after the link
*   print - Whether to print the menu or return it. Defaults to true
*   depth - how many levels of the hierarchy are to be included. 0 means all. Defaults to 0

== Frequently Asked Questions ==
= My breadcrumb displays more links it should, is it normal? =
Yes, the element you are viewing is certainly linked to a menu entry "naturaly" and "virtualy".
Just edit the element and be sure that the "Select Menu" is set to "None".

= My Contextual Nav Submenu Widget is not visible, is it normal? =
The Contextual Nav Submenu Widget only shows up if the element you are viewing is related to the menu you selected.
If it is, the menu must have at least 2 level to show up too.
Be sure your widget is well configured too.
For example if the starting depth is set to 0, the proof must be set to at least 2.
If the starting depth is set to 1, the proof must be set to at least 3.
...

== Screenshots ==
1. WP Fullpage Breadcrumb Settings Page.
2. Contextual Nav Submenu Widget.
3. "Add Parent Menu Item" metabox.
4. "Add Parent Menu Item" on tag page with bulk action.
5. The primary menu, the breadcrumb and the widget for a "normaly" orphan page.

== Changelog ==
= 1.2 =
*   Stable version.
*   Code refactor

= 1.1.1 =
*   Previous Stable version.

= 1.1 =
*   Initial release.

== Upgrade Notice ==
= 1.2 =
*   just click "upgrade" in the plugins page 

= 1.1.1 =
*   No need to upgrade, modifications on readme file. 

= 1.1 =
*   Initial release. 