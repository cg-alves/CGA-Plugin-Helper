=== CGA Plugin Helper ===
Contributors: cgalves
Tags: plugins, management, end-user, developer
Requires at least: 4.9.6
Tested up to: 4.9.6
Stable tag: 4.9.6
Requires PHP: 7.2.5
License: GPLv3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

This plugin will assist you in the installation of plugins, allowing you to choose from a curated list, manually search for plugins and export any active plugins into a text list.

== Description ==

This plugin is designed to assist end users in the installation of plugins. It allows you to choose from a curated list, manually search for plugins from the WP Store and export all currently active plugins into a list that can later be used to import them. This can be very useful for faster deployments.

Stand out features are:
* Download, install and activate plugins in a single click;
* Choose plugins from a curated list;
* Manually search for several plugins at once;
* Export all of your plugins into a list that you can then use to re-install them in another installation or deployment;
* Easy, simple to understand code, that can be easily modified to suit your needs;
* Use of Wordpress API to provide seamless integration.

You can check out the source code, submit patches, improvements or translations, and report bugs at the project's github page: https://github.com/cg-alves/CGA-Plugin-Helper.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/plugin-helper` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Use the Settings->Plugin Name screen to configure the plugin
4. (Make your instructions match the desired user flow for activating and installing your plugin. Include any steps that might be needed for explanatory purposes)

== Screenshots ==

1. Homepage of the plugin
2. Curated plugin list
3. Manual plugin search

== Changelog ==

= 1.2.0 =
* Removed $_SESSIONS dependency. This plugin will no longer conflict with caching
* Changed branding
* Fixed error that appeared when using the curated plugin install

= 1.1.0 =
* Added new curated plugins and categories
* Added new translation strings for new categories
* Separated curated plugins into a new file

= 1.0.6 =
* Changed $_SESSION to only start with init, and to die on logout
* Added option to load a curated plugin list from the uploads directory of Wordpress
* Plugin now checks if upload directory exists and creates it if it doesn't
* Added 'pph' prefix to functions
* Removed erroneously placed error reporting 
* Fixed some translation strings

= 1.0.0 =
* First Stable Release
* Added Manual Search Function
* Added Curated List Function
* Added Export Function
* Added Support for Portuguese (Portugal) and English (US)

