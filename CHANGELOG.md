# Changelog

## 2021-09-15
### Changed
- Removed uninstall.php file and added uninstall hook with class instead. Allows for dynamic plugin name retrieval during unistall
- Added SonarCloud Scanning for code quality

## 2021-08-09
### Fixed
- Fixed problem where plugin couldn't be activated in bulk
- Fixed problem where plugin couldn't be deactivated in bulk
### Added
- Proper PHP Headings (`Requires at least:` and `Tested up to:`)

## 2021-07-24
### Fixed
- Fixed wrong usage of deactivate-plugin_ wp_nonce prefix instead of activate-plugin_
- Fixed wrong usage shortcode prefix when registering shortcode. Props @anwas, https://github.com/TukuToi/better-wp-plugin-boilerplate/pull/6
### Added 
- Added complete ShortCode example
### Fixed 
- use https instead of https in placeholder
- fixed some dummy placeholders to work with the TukuToi Plugin Generator
- updated "Tested up to" version


## 2021-07-14
### Changed
- Use Strict comparison instead of loose comparison
- Some alignement of signs fixed to satisfy PHPCS GitHub action
- Verify WP Nonce when deactivating a Plugin
- Some space alignements in multiline conditions adjusted

## 2021-07-9
### Added
- PHPCS and WPCS GitHub Actions (to the main repo)
- Updated readme of main repo

## 2021-07-6
### Added
- Added ability to remove actions and filters added by the plugin.
- Added unique plugin prefix used to prefix technical functions.

## 2021-07-5
### Changed
- Updated Readme.md.
- Updated all files to follow 100% WPCS.
- Updated empty index.php files to include a meaningful and WPCS compliant comment.
- Updated readme with proper example how to add larger code chunks to Plugin Readme.
- Updated JS files comments to use `$( window ).on('load', function() {` instead of shorthand `$( window ).load(function() {`
- Updated i18N class to i18n class so to be WPCS compliant.
- Renamed functions outside of classes to be *prefixed* instead of *suffixed* with plugin_name, for compliance WP and codecanyon
- Corrected some typos
- Corrected Requires at least:, Tested up to: and Stable tag: in plugin readme.txt file
### Added
- Added new ShortCode handler to work just like the add action and add filter handlers of WPPB
- added @param $hook_suffix to admin_enqueue_scripts callbacks.


* (3 July 2015). Flattened the folder structure so there is no .org repo parent folder.
* (4 September 2014). Updating the `README` with Windows symbolic link instructions.
* (3 September 2014). Updating the `README` to describe how to install the Boilerplate.
* (1 September 2014). Initial Release.
