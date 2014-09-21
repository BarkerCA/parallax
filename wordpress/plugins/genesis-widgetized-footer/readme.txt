=== Genesis Widgetized Footer ===
Contributors: daveshine, deckerweb
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, footer, copyright, shortcodes, widget, widgets, disclaimer, deckerweb
Requires at least: 3.2
Tested up to: 3.6
Stable tag: 1.4.0
License: GPL-2.0+
License URI: http://www.opensource.org/licenses/gpl-license.php

Finally, use widgets to edit the Footer area ('Return to Top' plus 'Copyright/Credits') in Genesis Framework and Child Themes.

== Description ==

> #### New Flexibility plus Enhanced Webmaster Experience
> Changing the footer 'Copyright/Credits' & 'Return to Top' in Genesis is already easy with the use of Genesis Footer Shortcodes or some other plugins. However, it COULD still be much easier and more flexible with Widgets in WordPress! This plugin just achieves that, and at the same time keeping full [Genesis Shortcodes](http://my.studiopress.com/docs/shortcode-reference/#footer-shortcodes) support for the footer section! *Yes, it's that cool! ;-)*
> 
> You can use up to two widget Areas! Place one - full-width then - or two (one third/two thirds then) and get back the flexibility you've wanted for this area! Manage your copyright/credits stuff the way YOU want it, without messing up your 'functions.php' file... Just place in a text widget with copyright stuff, another one with logos and/or affiliate links, an additional search widget, recent posts widget, some explanation via text widget... You got it. The possibilities are endless. Finally.
> 
> A great helper tool for Genesis Child Themes!

**Please note:** The plugin requires the *Genesis Theme Framework*, a paid premium product released by StudioPress/ Copyblogger Media LLC (via studiopress.com).

= Advantages =
* Hugely improved webmaster/site owner experience! (Helps decrease the *Mmh, how do I customize this footer thing...?* experiences)
* Easily customizeable for any webmaster: Fully WordPress widget flexibility plus full Genesis Footer Shortcodes support!
* No more messing up with 'functions.php' file and forget the risk of breaking your child theme way too often...
* Developers: Hand this to your clients who want to customize their footer THEMSELVES, there's no easier tool for that in Genesis!
* Included Disclaimer Widget Area for special disclaimer/imprint needs - fully optional, though!
* Works across Genesis child themes - so you can switch your "skin" but not loosing this tool :-)
* Ideal for multilingual websites (for example with "WPML"): Much better handling of footer/disclaimer content for different languages. -- [See bottom of FAQ section here](http://wordpress.org/extend/plugins/genesis-widgetized-footer/faq/) for more info on that.

= General Features =
* Small & lightweight plugin tool: Just activate plugin, place your widget(s) and you're done!
* Replaces Genesis #footer content area with with up to two Widget areas (Sidebars)!
 * PLEASE NOTE: Not to be confused with the "Footer Widget Areas" which normally come in columns and belong to the #footer-widgets div container ID. This plugin here only changes the regular footer content within the #footer div container ID, the other 'Footer Widgets #1 etc.' keep untouched!
 * What that means: Manage your copyright and/or disclaimers also widget-based from now on - easy to use and to change! -- Indepentendly from this, manage your other regular #footer-widget areas in your child theme (most come with these by default).
 * If you only place something into ONE footer widget area (no matter 'Footer Area #1' or 'Footer Area #2') it will be full-width!
 * If you place something into the two footer Widget areas TOGETHER they will change their width: 'Footer Area #1' is first from left and will have 33% width (one third), 'Footer Area #2' is second to left and will have 66% width (two-thirds). Both values and the float could be overridden via child theme stylesheet (using '!important')
 * Adds a few CSS styles for this footer content area to properly divide widgets with some more space (all other styling is recommended via your child theme)
* Included is an additional Widget area called "Footer Disclaimer", this is placed below the #footer div container ID and absolutely optional. Only if you place a widget in there it displays content!
 * Features full-width plus a real small font-size for disclaimer/ imprint purposes.
 * Included are 2 Shortcodes: one handy Shortcode for last updated date for your site; plus Shortcode to display any of the plugin's 3 Widget areas (if active) into Shortcode-aware content areas.
 * Included helper function to place this at the very bottom (genesis_after hook) -- [See FAQ section here](http://wordpress.org/extend/plugins/genesis-widgetized-footer/faq/) for more info on that.
* Child theme compatible: Out of the box it should work really fine with all official child themes by StudioPress pluss all Community/Marketplace child themes from studiopress.com
 * Includes support for both versions of "Prose" 1.0/1.5.x (has repositioned footer!)
 * Includes support for "Metro" 1.0 (has repositioned footer!)
 * Includes support for "Pretty Young Thing" 1.0/1.1 (has another footer function)
 * Includes support for "Modern Blogger" 1.0 (has another footer function)
 * Includes support for "AgentPress" 2.x and "RealPro" 1.0 - the plugin's disclaimer widget degrades gracefully as "AgentPress" 2.x and RealPro 1.0 have built-in their own.
* Resonsive Design of child themes is supported (i.e. keeps untouched!).
* Landing Pages via page templates are supported since plugin version 1.2+, that means: 'Footer Area #1' or 'Footer Area #2' not there in the footer! (Custom disabling via constant is possible, see FAQ here!)
* Fully internationalized! Real-life tested and developed with international users in mind!
* Fully WPML compatible!
* Fully Multisite compatible, you can also network-enable it if ever needed (per site use is recommended).
* Tested with WordPress 3.3 branch versions and 3.4 branch versions - also in debug mode (no stuff there, ok? :)

= Localization =
* English (default) - always included
* German (de_DE) - always included
* .pot file (`genesis-widgetized-footer.pot`) for translators is also always included :)
* Easy plugin translation platform with GlotPress tool: [Translate "Genesis Widgetized Footer"...](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/genesis-widgetized-footer)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= More =
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)
* Hey, come & join the [*Genesis Community on Google+* :)](http://ddwb.me/genesiscommunity)

== Installation ==

**NOTE:** Only works with *Genesis Framework* as the parent theme. This is a paid premium product by StudioPress/ Copyblogger Media LLC, available via studiopress.com.

1. Upload `genesis-widgetized-footer` folder to the `/wp-content/plugins/` directory -- or just upload the ZIP package via 'Plugins > Add New > Upload' in your WP Admin
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to the "Widgets" admin page and configure your widgets for the "Footer Area #1/#2" and the optional "Footer Disclaimer".
4. Enjoy & relax, as you can easily manage this now from you Widgets admin :)

**Note:** The "Genesis Framework" is required for this plugin in order to work. If you don't own a copy it yet, this premium parent theme has to be bought. More info about that you'll find here: http://ddwb.me/getgenesis

**Own translation/wording:** For custom and update-secure language files please upload them to `/wp-content/languages/genesis-widgetized-footer/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that, just use a language file like `genesis-widgetized-footer-en_US.mo/.po` to achieve that (for creating one see the tools on "Other Notes").

== Frequently Asked Questions ==

= I already use "Genesis Simple Edits" so why in the world do I need this plugin? =
If you're satisfied with your configuration there's no need for this plugin. Never change a running system :). Otherwise you might find this plugin useful as it also supports all of the Genesis Footer Shortcodes! And you might have even more possibilities then.

= Are there any limitations of this plugin? =
Yes. If a child theme has repositioned its footer or done other things with that, my plugin cannot work. It relies on the default footer hook of Genesis which is used unchanged by almost all official child themes! For the slightly different footer functions in "Prose", "Pretty Young Thing" and "Modern Blogger" child themes is already full support included, though!

= Where do I find the Genesis Footer Shortcode reference? =
All of the seven available shortcodes are listed and explained here: [Genesis Footer Shortcodes](http://my.studiopress.com/docs/shortcode-reference/#footer-shortcodes)

= How can I reposition the Disclaimer widget after the footer, just at the very bottom of the page? =
This is possible and the plugin already comes with a handy helper function for that. Just use the following code in your child theme's functions.php file or in your functionality plugin:
`
/** Genesis Widgetized Footer: Reposition Disclaimer Widget to the Very Bottom */
add_action( 'genesis_before', '__gwfoot_footer_disclaimer_bottom' );
`
--> Explanation: This helper function just fires through the 'genesis_before' hook to catch the right priorities for loading stuff but places the whole widget area in the 'genesis_after' hook! Note: This function is fully compatible with the "Prose" child theme, as it does various checks.

= How does the styling work? =
Same as before using this plugin. The plugin does NOT touch any theme styles. Still it can be neccessary to tweak some styles, for example if you're using a search form in the footer you might change the button color or font size or whatever a bit.

For extended styling of the new widget areas there a few IDs and classes included. These are:

* 'Footer Area #1':
 * ID wrapped around whole area: `#gwfoot-footer-one-area`
 * area class full-width case: `.gwfoot-footer-one-full-width`
 * area class one third case: `.gwfoot-footer-one-one-third`
 * Widgets, before widget: `.gwfoot-footer-one`
* 'Footer Area #2':
 * ID wrapped around whole area: `#gwfoot-footer-two-area`
 * area class full-width case: `.gwfoot-footer-two-full-width`
 * area class two thirds case: `.gwfoot-footer-two-two-thirds`
 * Widgets, before widget: `.gwfoot-footer-two`
* 'Footer Disclaimer':
 * ID wrapped around whole area: `#gwfoot-footer-disclaimer-area`
 * area content class: `.gwfoot-footer-disclaimer-content`
 * Widgets, before widget: `.gwfoot-footer-disclaimer`

If that's still not enough, you can even enqueue your own style, an action hook is included for that: `gwfoot_load_styles` -- This hook fires within the WordPress action hook `wp_enqueue_scripts` just after properly enqueueing the plugin's styles and only if at least one of the three widgets is active, so it's fully conditional!

= For Landing Page Templates, how can I re-add one or both Footer Widget Areas? =
Since plugin version 1.2.0+ both areas are hidden for all known landing page templates of official plus market/community child themes. Re-adding them is possible via your child theme's `functions.php` file or a functionality plugin. Just add this code:
`
/** Genesis Widgetized Footer: Re-add Footer Widget Areas for Landing Pages */
define( 'GWFOOT_REMOVE_LANDING_FOOTER', FALSE );
`

= For Landing Page Templates, how can I remove the Dislaimer Area? =
Since plugin version 1.2.0+ removing is possible via your child theme's `functions.php` file or a functionality plugin. Just add this code:
`
/** Genesis Widgetized Footer: Remove Disclaimer for Landing Pages */
define( 'GWFOOT_LANDING_DISCLAIMER', FALSE );
`

= Can I completely remove Disclaimer Widget Area? =
Yes, this is possible since plugin version 1.3.0! Just add this code to your child theme's `functions.php` file or a functionality plugin:
`
/** Genesis Widgetized Footer: Remove Disclaimer Widget Area */
define( 'GWFOOT_NO_DISCLAIMER_WIDGET_AREA', TRUE );
`

= Could I disable the Shortcode support for widgets? =
Of course, it's possible! Just add the following constant to your child theme's `functions.php` file or to a functionality plugin:
`
/** Genesis Widgetized Footer: Remove Widgets Shortcode Support */
define( 'GWFOOT_NO_WIDGETS_SHORTCODE', TRUE );
`
Some webmasters could need this for security reasons regarding their stuff members or for whatever other reasons... :).


= What are parameters of the plugin's own Shortcodes? =

**(1) Parameters for `[gwfoot-widget-area]` Shortcode:**

* `area` -- ID of the Widget area (Sidebar) (default: none, empty)
* The following values are accepted: `footer-one` OR `footer-two` OR `footer-disclaimer`

**(2) Parameters for `[gwfoot-lastupdated]` Shortcode:**

* `date_format` -- Date format (default: format you've set via "General Settings")
* `wrapper` -- HTML wrapper tag (default: `p` (paragraph))
* `class` -- Additional custom CSS class for the wrapper (default: none, empty)
* `text_before` -- Text string, displayed before the date (default: `Latest update date:`)
* `text_after` -- Text string, displayed after the date (default: none, empty)

= Could I completely remove the plugin's Shortcode features? =
Of course, that's possible! Just add the following constant to your child theme's `functions.php` file or to a functionality plugin:
`
/** Genesis Widgetized Footer: Remove Shortcode Features */
define( 'GWFOOT_SHORTCODE_FEATURES', TRUE );
`


= How can I customize the widget titles/strings in the admin? =
I've just included some filters for that - if ever needed (i.e. for clients, branding purposes etc.), you can use these filters:

**gwfoot_filter_footer_one_widget_title** - default value: "Footer Area #1"

**gwfoot_filter_footer_one_widget_description** - default value: "This is the first widget area (%s) within the Genesis Footer." (where the `%s` placeholder defaults to the `gwfoot_filter_footer_two_widget_title`)

**gwfoot_filter_footer_two_widget_title** - default value: "Footer Area #2"

**gwfoot_filter_footer_two_widget_description** - default value: "This is the second widget area (%s) within the Genesis Footer." (where the `%s` placeholder defaults to the `gwfoot_filter_footer_two_widget_title`)

**gwfoot_filter_footer_disclaimer_widget_title** - default value: "Footer Disclaimer"

**gwfoot_filter_footer_disclaimer_widget_description** - default value: "This is the widget area of the search not found content section."

Example code for changing one of these filters:
`
add_filter( 'gwfoot_filter_footer_one_widget_title', 'gwfoot_custom_footer_one_widget_title' );
/**
 * Genesis Widgetized Footer: Custom Footer Area Widget Title
 */
function gwfoot_custom_footer_one_widget_title() {
	return __( 'Custom Footer Area', 'your-child-theme-textdomain' );
}
`


**Final note:** I DON'T recommend to add customization code snippets to your child theme's `functions.php` file! **Please use a functionality plugin or an MU-plugin instead!** This way you can also use this better for Multisite environments. In general you are not abusing the functions.php for plugin-specific stuff and you are then also more independent from child theme changes etc. If you don't know how to create such a plugin yourself just use one of my recommended 'Code Snippets' plugins. Read & bookmark these Sites:

* [**"What is a functionality plugin and how to create one?"**](http://wpcandy.com/teaches/how-to-create-a-functionality-plugin) - *blog post by WPCandy*
* [**"Creating a custom functions plugin for end users"**](http://justintadlock.com/archives/2011/02/02/creating-a-custom-functions-plugin-for-end-users) - *blog post by Justin Tadlock*
* DON'T hack your `functions.php` file: [Resource One](http://thomasgriffinmedia.com/custom-snippets-plugin/) - [Resource Two](http://thomasgriffinmedia.com/blog/2012/09/calling-on-the-wordpress-community/) *(both by Thomas Griffin Media)*
* [**"Code Snippets"** plugin by Shea Bunge](http://wordpress.org/extend/plugins/code-snippets/) - also network wide!
* [**"Code With WP Code Snippets"** plugin by Thomas Griffin](https://github.com/thomasgriffin/CWWP-Custom-Snippets) - Note: Plugin currently in development at GitHub.
* [**"Toolbox Modules"** plugin by Sergej Müller](http://wordpress.org/extend/plugins/toolbox/) - see also his [plugin instructions](http://playground.ebiene.de/toolbox-wordpress-plugin/).

All the custom & branding stuff codes above can also be found as a Gist on GitHub: https://gist.github.com/2497456 (you can also add your questions/ feedback there :)


= How can I use the advantages of this plugin for multilingual sites? =
(1) In general: You may use it for "global" widgets.

(2) Usage with the "WPML" plugin:
Widgets can be translated with their "String Translation" component - this is much easier than adding complex footer credits logic for a lot of languages to your functions.php...

You can now also place the "Language Switcher Widget" at the bottom of your site :).

You can use the awesome ["Widget Logic"](http://wordpress.org/extend/plugins/widget-logic/) plugin (or similar ones) and add additional paramaters, mostly conditional stuff like `is_home()` in conjunction with `is_language( 'de' )` etc. This way widget usage on a per-language basis is possible. Or you place in the WPML language codes like `ICL_LANGUAGE_CODE == 'de'` for German language. Fore more info on that see their blog post: http://wpml.org/2011/03/howto-display-different-widgets-per-language/

With the following language detection code you are now able to make conditional statements, in the same way other WordPress conditional functions work, like `is_single()`, `is_home()` etc.:
`
/**
 * WPML: Conditional Switching Languages
 *
 * @author David Decker - DECKERWEB
 * @link   http://twitter.com/deckerweb
 *
 * @global mixed $sitepress
 */
function is_language( $current_lang ) {

	global $sitepress;

	if ( $current_lang == $sitepress->get_current_language() ) {
		return true;
	}
}
`

*Note:* Be careful with the function name 'is_language' - this only works if there's no other function in your install with that name! If it's already taken (very rare case though), then just add a prefix like `my_custom_is_language()`.

--> You now can use conditionals like that:

`
if ( is_language( 'de' ) ) {
	// do something for German language...
} elseif ( is_language( 'es' ) ) {
	// do something for Spanish language...
}
`

== Screenshots ==

1. Genesis Widgetized Footer: two additional widget areas (sidebars) - here with some example Text Widgets placed in... ([Click here for larger version of screenshot](https://www.dropbox.com/s/1gctvhul6hk3zx7/screenshot-1.png))
2. Genesis Widgetized Footer: the plugin in action on a live site - displaying three widget areas here: 'Footer Area #1' (left side, one third width), 'Footer Area #' (right side, two thirds width) plus the optional 'Footer Disclaimer' widget at the bottom (full-width). Shown here with my "Autobahn" child theme. ([Click here for larger version of screenshot](https://www.dropbox.com/s/6povxabgfoqe3ck/screenshot-2.png))
3. Genesis Widgetized Footer: plugin's optional Shortcodes in action for a post. ([Click here for larger version of screenshot](https://www.dropbox.com/s/7bdtcteb45p0hse/screenshot-3.png))
4. Genesis Widgetized Footer: plugin's help tab. ([Click here for larger version of screenshot](https://www.dropbox.com/s/wf9bmu0u09mje7f/screenshot-4.png))

== Changelog ==

= 1.4.0 (2013-05-08) =
* NEW: Added full support for "Metro" child theme, official, by StudioPress (note: Metro has repositioned footer).
* NEW: Added Shortcode `[gwfoot-lastupdated]` for displaying the date when your site was last updated.
* NEW: Added Shortcode `[gwfoot-widget-area]` for displaying any of the plugin's 3 Widget areas (if active) into Shortcode aware content areas.
* UPDATE: Additional stylesheet now uses the WordPress convention for file names: `gwfoot-styles.min.css` is the minified default version, plus, `gwfoot-styles.css` is now the development version. If `WP_DEBUG` or `SCRIPT_DEBUG` constants are `true`, the dev styles will be loaded. This makes development/ customizing & debugging a lot easier! :)
* UPDATE: Improved versioning of stylesheet, also in light of above update :).
* UPDATE: All frontent relevant code is now moved into the plugin's frontend file and only then loaded!
* CODE: Some code optimizations, plus code/documentation updates & improvements.
* UPDATE: Updated readme.txt file here.
* UPDATE: Updated German translations and also the .pot file for all translators.

= 1.3.0 (2012-12-15) =
* *Maintenance release*
* UPDATE: Added the class placeholder to widget registrations to fullfill WordPress standard for Widgets API.
* NEW: Added constant for disabling the widget shortcode support (see FAQ here).
* NEW: Added constant for disabling the Disclaimer widget area (see FAQ here).
* CODE: Some code/documentation updates & improvements.
* UPDATE: Updated readme.txt file here.
* UPDATE: Initiated new three digits versioning, starting with this version.
* UPDATE: Updated German translations and also the .pot file for all translators.
* UPDATE: Moved screenshots to 'assets' folder in WP.org SVN to reduce plugin package size.

= 1.2.0 (2012-08-20) =
* *Maintenance release*
* NEW: Added full support for all known Landing Page Templates in official plus market/community child themes, so that the plugin's widget areas don't appear there. A constant for custom disabling is included (see FAQ for more info).
* UPDATE: Improved CSS styling for the Footer Disclaimer Widget, allowing better styling/overriding via child theme. (In rare cases you may re-apply your additions to the ID `#gwfoot-footer-disclaimer-area` and/or the new class within `.gwfoot-footer-disclaimer-content`.)
* NEW: Compressed CSS file for improved performance (the development file has now the file name `gwfoot-styles.dev.css` and is still packaged).
* NEW: Added help tab also on Genesis settings page.
* NEW: Added support for "RealPro" child theme, which is a variant of AgentPress (supporting disclaimer footer areas in both).
* CODE: Minor code/documentation updates & improvements.
* UPDATE: Updated German translations and also the .pot file for all translators.
* UPDATE: Extended and improved readme.txt file documentation here.
* UPDATE: Extended GPL License info in readme.txt as well as main plugin file.
* NEW: Easy plugin translation platform with GlotPress tool: [Translate "Genesis Widgetized Footer"...](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/genesis-widgetized-footer)

= 1.1.0 (2012-04-27) =
* NEW: Added little help tab on Widget admin page for better user experience. (Works only with WordPress 3.3 or higher!)
* UPDATE: Moved plugin links from main file to extra admin file which only loads within 'wp-admin', this way it's performance-improved! This also effects the new help tab stuff :).
* UPDATE: Improved loading of styles: only when the widgets are active, otherwise load nothing!
* BUGFIX: Corrected typo in description of 'Footer Area #2'.
* UPDATE: Added description of helper function for Disclaimer widget to the FAQ section here.
* CODE: Minor code/documentation tweaks and improvements.
* UPDATE: Extended and improved readme.txt file documentation here.
* UPDATE: Updated German translations and also the .pot file for all translators.
* UPDATE: Added banner image on WordPress.org for better plugin branding :)

= 1.0.0 (2012-04-25) =
* Initial release

== Upgrade Notice ==

= 1.4.0 =
Several additions & improvements: Metro child theme support; Shortcode. Some code & documentation optimizations and improvements. Also updated .pot file for translators plus German translations.

= 1.3.0 =
Maintenance release: Improvements for the Widgets API. Minor code & documentation improvements. Also updated .pot file for translators plus German translations.

= 1.2.0 =
Maintenance release: Added Landinge Page Template support (no widget!). Improved CSS styling for disclaimer area. Minor code improvements. Also updated .pot file for translators plus German translations.

= 1.1.0 =
Several improvements: Performance/Code improvements. Added little help tab, corrected typos and extended readme.txt documentation. Also updated .pot file for translators plus German translations.

= 1.0.0 =
Just released into the wild.

== Plugin Links ==
* [Translations (GlotPress)](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-widgetized-footer)
* [User support forums](http://wordpress.org/support/plugin/genesis-widgetized-footer)
* [Code snippets archive for customizing, GitHub Gist](https://gist.github.com/2497456)

== Donate ==
Enjoy using *Genesis Widgetized Footer*? Please consider [making a small donation](http://genesisthemes.de/en/donate/) to support the project's continued development.

== Translations ==

* English - default, always included
* German (de_DE): Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-widgetized-footer)
* For custom and update-secure language files please upload them to `/wp-content/languages/genesis-widgetized-footer/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `genesis-widgetized-footer-en_US.mo/.po` to achieve that.

**Easy plugin translation platform with GlotPress tool:** [**Translate "Genesis Widgetized Footer"...**](http://translate.wpautobahn.com/projects/wordpress-plugins-deckerweb/genesis-widgetized-footer)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/), which works fine on Windows, Mac and Linux.

== Idea Behind / Philosophy ==
For some client projects I had the request to build the footer stuff with widgets - additional to the optional footer widgets in #footer-widgets container. Better than to implement this in every child theme, I thought of making this into a plugin. So it can be used for almost all Genesis child themes. Once it was done, I also added a fully optional Disclaimer widget area so that it is possible to add more disclaimer/ legal/ imprint/ copyright stuff with a much smaller font presentation. Now, that's a round thing and I hope it will help some users to better maintain their footer stuff ;-).

== Credits ==
* Thanks to all users and supporters of the plugin!
* Thanks to all reviewers who actually used the plugin and then gave a good rating. I really appreciate that :) THANK YOU!