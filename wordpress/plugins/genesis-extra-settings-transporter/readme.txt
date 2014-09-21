=== Genesis Extra Settings Transporter ===
Contributors: daveshine, deckerweb
Donate link: http://genesisthemes.de/en/donate/
Tags: genesis, genesiswp, genesis framework, settings, plugins, child themes, export, import, exporter, transport, transporter, data, deckerweb
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 1.2.0
License: GPL-2.0+
License URI: http://www.opensource.org/licenses/gpl-license.php

Adds support for exporting settings of various Genesis Framework specific plugins & Child Themes via the Genesis Exporter feature.

== Description ==

> #### Backup or Transfer Settings
> Finally, not only do backups or transfers of Genesis core settings but **also hook in official & third-party plugins** plus **some child themes**. Especially useful for developers to speed up their work!
> 
> A great helper tool for Genesis child themes plus Genesis-specific plugins with their own **extra settings**!

= Features, Advantages & Benefits =
* Currently 24 different plugins are supported. (These being official ones plus third-party community plugins.)
* Currently 58 different child themes with extra settings are supported. (These being all third-party child themes sold or downloadable via "StudioPress Community Marketplace" *or* elsewhere.)
* Settings export for the first time possible for a lot of these plugins and/ or child themes!
* Combined settings .JSON file, speeds up development especially!
* Seperate plugin settings .JSON files could be useful for testing purposes for developers etc.
* New plugins and child themes may be added, that support the Genesis Settings Field/ API!
* Also, plugins and child themes that natively hook in to the Genesis Exporter themselves may be removed from support here (to avoid doubled items!).
* Fully internationalized plugin, fully transalateable.
* This plugin just leverages the AWESOMENESS of Genesis Framework and WordPress! Therefore it's a really simple, lightweight, flexible plugin.

See the *FAQ* here for a [**full list of supported plugins & child themes...**](http://wordpress.org/extend/plugins/genesis-extra-settings-transporter/faq/)

= Useful for: =
* Users who want to backup their settings - in a combined way, or seperate for supported plugins and/ or themes.
* Developers and/ or agencies who want to speed up their development times and just use pure Genesis awesomeness :).

> #### Typical Workflow Example
> *Transfer settings from a development install to the live/ production install.*
> 
> **1) Prerequisites/ Requirements:**
> 
> * On BOTH sites/ installations you have installed & activated for example the (great) "Curtail" child theme, plus the following plugins: Genesis Layout Extras, Genesis Responsive Slider, Genesis Simple Hooks, Genesis Simple Sidebars.
> * On BOTH sites/ installations you have installed & activated this plugin, "Genesis Extra Settings Transporter".
> * It's recommended to have THE VERY SAME VERSIONS installed on the original site and also the receiving site. Reason: sometimes settings differ between plugin or child theme versions. So with making sure you have the same versions installed you just ensure the correct settings are included within the export file.
> 
> **2) Transfer:**
> 
> * On the development install: Just make an Export file via "Genesis > Import/Export" admin page:
> * In the "Export" section there enable all checkboxes you need.
> * Save the .JSON file to your computer.
> * On the live/ production site, just import this .JSON file and you're done! ;-)

Please note: This plugin requires the Genesis Theme Framework.

= Localization =
* English (default) - always included
* German (de_DE) - always included
* .pot file (`genesis-extra-settings-transporter.pot`) for translators is also always included :)
* Easy plugin translation platform with GlotPress tool: [Translate "Genesis Extra Settings Transporter"...](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-extra-settings-transporter)
* *Your translation? - [Just send it in](http://genesisthemes.de/en/contact/)*

[A plugin from deckerweb.de and GenesisThemes](http://genesisthemes.de/en/)

= Feedback =
* I am open for your suggestions and feedback - Thank you for using or trying out one of my plugins!
* Drop me a line [@deckerweb](http://twitter.com/deckerweb) on Twitter
* Follow me on [my Facebook page](http://www.facebook.com/deckerweb.service)
* Or follow me on [+David Decker](http://deckerweb.de/gplus) on Google Plus ;-)

= More =
* My 'exporter plugin' for "Premise" plugin: [*"Premise Settings Transporter"*](http://wordpress.org/extend/plugins/premise-settings-transporter/)
* My 'Genesis Widgetized' plugins: [*"Genesis Widgetized Not Found & 404"*](http://wordpress.org/extend/plugins/genesis-widgetized-notfound/), [*"Genesis Widgetized Archive"*](http://wordpress.org/extend/plugins/genesis-widgetized-archive/) plus [*"Genesis Widgetized Footer"*](http://wordpress.org/extend/plugins/genesis-widgetized-footer/)
* [Also see my other plugins](http://genesisthemes.de/en/wp-plugins/) or see [my WordPress.org profile page](http://profiles.wordpress.org/daveshine/)
* Tip: [*GenesisFinder* - Find then create. Your Genesis Framework Search Engine.](http://genesisfinder.com/)
* Hey, come & join the [Genesis Community on Google+ :)](http://ddwb.me/genesiscommunity)

== Installation ==

1. Upload `genesis-extra-settings-transporter` folder to the `/wp-content/plugins/` directory -- or just upload the ZIP package via 'Plugins > Add New > Upload' in your WP Admin
2. Activate the plugin through the "Plugins" menu in WordPress
3. Then go to the Genesis Exporter page under "Genesis > Import/Export" and check the available options.
4. Make your export(s), just for backup or transport settings into other installations, etc. ...
5. Enjoy :)

**Usage:** See plugin description for a ["Typical Workflow Example"](http://wordpress.org/extend/plugins/genesis-extra-settings-transporter/).

**Note:** The Genesis Framework is required for this plugin in order to work.

**Own translation/wording:** For custom and update-secure language files please upload them to `/wp-content/languages/genesis-extra-settings-transporter/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that, just use a language file like `genesis-extra-settings-transporter-en_US.mo/.po` to achieve that (for creating one see the tools on "Other Notes").

== Frequently Asked Questions ==

= What's the recommended usage of this plugin? =
Just see plugin [description page](http://wordpress.org/extend/plugins/genesis-extra-settings-transporter/) for a typical workflow example.

= "Genesis Simple Sidebars" plugin: Why are inpost/ inpage settings not included? =
Good question, hehe :). Simple answer: not possible as these settings belong to the actual post meta. You can always import & export all posts/ pages/ custom post types via the NATIVE WORDPRESS export and import functionality. This applies for any inpost/ inpage/ CPT post meta settings in WordPress generally. All administrator users have access to "Tools" in the left-hand admin menu and could do exports and imports.

= Why are Widget settings not included? =
That's just not possible yet. Still, there is no such functionality in WordPress core as is in Genesis yet! However, there's a nice third-party plugin for that, to use at your own risk: ["Widget Settings Importer/Exporter"](http://wordpress.org/extend/plugins/widget-settings-importexport/)

= Why isn't plugin/ child theme X,Y not supported? =
I can only support plugins and child themes that make use of the WordPress/ Genesis settings API and use a settings field other than that from Genesis itself. Will more developers add this to their work I could add support in this helper plugin. It's as simple as that :).

The way better alternative, though, is, when developers add that little hook in to the Genesis Exporter **natively**! In this case I might remove support here for such a plugin/ child theme, of course.

Also note, some plugins have 1 or 2 little settings included in Genesis Theme Settings, therefore THESE settings are then included in the native Genesis export file. So you'll already have these safe for your exports and imports as well.

= What's up with the Prose child theme? =
"Prose" natively includes its settings on the Genesis exporter page, so you're already hooked up! You can export and import all "Design Settings" at any time!

= Some settings seem not to be included, what should I do? =
Just make sure you have the very same versions of the plugins or child themes installed. If you have a development and live install, just make sure, both have "Genesis Simple Hooks, version 1.8.0.2" installed, to name an example. -- Reason: Sometimes setting field names could differ between different versions, or settings may be added or removed in newer/ older versions.

= Hands down, how does it all work? =
Just to clarify: This plugin here does NO export/ import ON ITS OWN! It just hooks in to the existing Genesis Exporter feature and leverages existing Genesis & WordPress functionality :).

= Finally come on, what is supported in detail? =
Just have look at the plugin & child theme listing:

> #### List of Supported Plugins
> * Genesis Simple Hooks (free, by StudioPress/Copyblogger Media LLC)
> * Genesis Simple Sidebars (free, by StudioPress/Copyblogger Media LLC)
> * Genesis Slider (free, by StudioPress/Copyblogger Media LLC)
> * Genesis Responsive Slider (free, by StudioPress/Copyblogger Media LLC)
> * Genesis Simple Edits (free, by StudioPress/Copyblogger Media LLC)
> * Genesis Layout Extras (free, by David Decker - DECKERWEB)
> * Genesis Simple Comments (free, by Nick Croft)
> * Genesis Simple Breadcrumbs (free, by Nick Croft)
> * Genesis Responsive Header (free, by Nick Croft)
> * Genesis Grid Loop (free, by Bill Erickson)
> * Genesis Bootstrap Carousel (free, by Justin Tallant)
> * Genesis Widget Toggle (free, by Arya Prakasa)
> * Genesis Accordion (free, by Pat Ramsey)
> * Genesis Post Navigation (free, by Iniyan)
> * Genesis 404 Page (free, by Bill Erickson)
> * Genesis Design Palette (free, by Andrew Norcross)
> * Generate Box (free, by Hesham Zebida)
> * Genesis Custom Backgrounds (free, by Travis Smith)
> * Genesis Custom Post Types Archives (free, by Travis Smith)
> * Genesis Portfolio (free, by Travis Smith) (plugin currently in beta state!)
> * WP Genesis Box (free, by Jimmy Peña)
> * Dynamic Content Gallery (DCG) (free, by Adew Walker/ studiograsshopper.ch) - from the Genesis ecosystem :)
> * WP-Cycle (free, by Nathan Rice) - from the Genesis ecosystem :)
> * *special bonus:* Premise, including "Member Access" module (premium, by Copyblogger Media LLC)
> 
> #### List of Supported Child Themes (free & premium)
> * All by "Web Savvy Marketing, LLC", 19 by the time of plugin release (all premium)
> * All by "Themedy" brand (by Red Streams Consulting), 17 by the time of plugin release (1 free, other premium)
> * All by "Agent Evolution, LLC", 2 by the time of plugin release (all premium)
> * All by "GenesisAwesome" (aka Harish Dasari), 3 by the time of plugin release (all free)
> * 9 child themes by "ZigZagPress" brand: Bijou, Engrave, Eshop, Megalithe, Showroom, Single, Solo, Tequila, Vanilla (all premium)
> * "Curtail" (premium, by Thomas Griffin Media -- via studiopress.com)
> * "Genesis Sandbox" (free, by SureFireWebservice & Travis Smith)
> * "Sandbox Theme" (premium, by SureFire Themes brand)
> * "AyoShop" v1.1+ (currently free, by AyoThemes)
> * "Dizain-01" (premium, by ThemeDizain)
> * "Radio" (free, by Greg Rickaby -- via GitHub.com)
> * "Egreen" (premium, by ThemeWolf)
> * "Bigg" (free, by OD - OpenDesigns.org)

== Screenshots ==

1. Genesis Extra Settings Transporter: supported plugins & child themes hooked in to the Genesis Exporter. ([Click here for larger version of screenshot](https://www.dropbox.com/s/l0dgp8jx6qfibxj/screenshot-1.png))
2. Genesis Extra Settings Transporter: plugin help tab. ([Click here for larger version of screenshot](https://www.dropbox.com/s/anio9js893294q0/screenshot-2.png))

== Changelog ==

= 1.2.0 (2013-03-22) =
* NEW: Added plugin support for "WP Genesis Box" -- free, by Jimmy Peña.
* NEW: Added plugin support for "Dynamic Content Gallery (DCG)" (free, by Adew Walker/ studiograsshopper.ch) - from the Genesis ecosystem :).
* NEW: Added plugin support for "WP-Cycle" (free, by Nathan Rice) - from the Genesis ecosystem :).
* NEW: Added child theme support for "Sandbox Theme" -- premium, by Surefire Themes brand.
* NEW: Added child theme support for "Eshop" and "Tequila" -- both are premium, by ZigZagPress brand.
* UPDATE: Load translations only within admin area to further improve performance.
* CODE: Minor code/documentation updates & improvements.
* UPDATE: Updated German translations and also the .pot file for all translators!

= 1.1.0 (2013-02-01) =
* Added plugin support for "Genesis Custom Backgrounds", "Genesis Custom Post Types Archives" and "Genesis Portfolio" -- all free, by Travis Smith.
* Added plugin support for "Premise" including its "Member Access" module -- Note: premium landing page plugin by Copyblogger Media LLC (same company as behind "Genesis" :).
* Added child theme support for "Megalithe" v1.2+ -- premium, by ZigZagPress brand.
* Added child theme support for "Bigg" -- free, by OD - OpenDesigns.org.
* UPDATE: Extended and improved plugin's inline help info.
* UPDATE: Updated readme.txt file here with improved instructions and extended FAQ section.
* UPDATE: Updated German translations and also the .pot file for all translators!

= 1.0.0 (2013-01-25) =
* *Initial release*
* Includes support for 17 different plugins.
* Includes support for 53 different child themes.

== Upgrade Notice ==

= 1.2.0 =
Several additions & improvements: Extended plugin & child theme support. Code improvements. Also updated German translations and .pot file for all translators.

= 1.1.0 =
Several additions & improvements: Extended plugin & child theme support. Improved plugin help info. Also updated German translations and .pot file for all translators.

= 1.0.0 =
Just released into the wild.

== Plugin Links ==
* [Translations (GlotPress)](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-extra-settings-transporter)
* [User support forums](http://wordpress.org/support/plugin/genesis-extra-settings-transporter)

== Donate ==
Enjoy using *Genesis Extra Settings Transporter*? Please consider [making a small donation](http://genesisthemes.de/en/donate/) to support the project's continued development.

== Translations ==

* English - default, always included
* German (de_DE): Deutsch - immer dabei! [Download auch via deckerweb.de](http://deckerweb.de/material/sprachdateien/genesis-plugins/#genesis-extra-settings-transporter)
* For custom and update-secure language files please upload them to `/wp-content/languages/genesis-extra-settings-transporter/` (just create this folder) - This enables you to use fully custom translations that won't be overridden on plugin updates. Also, complete custom English wording is possible with that as well, just use a language file like `genesis-extra-settings-transporter-en_US.mo/.po` to achieve that.

**Easy plugin translation platform with GlotPress tool:** [**Translate "Genesis Extra Settings Transporter"...**](http://translate.wpautobahn.com/projects/genesis-plugins-deckerweb/genesis-extra-settings-transporter)

*Note:* All my plugins are internationalized/ translateable by default. This is very important for all users worldwide. So please contribute your language to the plugin to make it even more useful. For translating I recommend the awesome ["Codestyling Localization" plugin](http://wordpress.org/extend/plugins/codestyling-localization/) and for validating the ["Poedit Editor"](http://www.poedit.net/), which works fine on Windows, Mac and Linux.

== Idea Behind / Philosophy ==
Exporting and importing settings for plugins like "Genesis Simple Hooks" or my own "Genesis Layout Extras" plugin was always a "nice to have". Now, that I've found out Genesis had a filter for that - thanks to Genesis developer [Gary Jones](http://garyjones.co.uk/)! - I just created this plugin. It's a small tool I need & use myself and I hope it helps other users and developers as well! :) ENJOY!
