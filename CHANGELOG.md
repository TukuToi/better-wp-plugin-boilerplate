# Changelog

## 2021-07-6
### Added
- Added ability to remove actions and filters added by this plugin.
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
