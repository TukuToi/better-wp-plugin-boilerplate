# Better WordPress Plugin Boilerplate

This is a Hard Fork of the original [WordPress Plugin Boilerplate](https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).
The **Better**) WordPress Plugin Boilerplate actively takes PRs and is maintained and under active development, as well has more features than the original.
The goal is still a standardized, organized, object-oriented foundation for building high-quality WordPress Plugins.

A Generator Plugin to generate new Plugins by filling out a form is available [here](https://github.com/TukuToi/tukutoi-plugin-generator) and acts like a WordPress Plugin.
It can be used to *generate* a Plugin based on *any* boilerplate source really, but uses by default the Better WordPress Plugin Boilerplate.

The generator form will soon be online on a standalone website as well.

## Features

* The Boilerplate is based on the [Plugin API](http://codex.wordpress.org/Plugin_API), [Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/), and [Documentation Standards](https://developer.wordpress.org/coding-standards/inline-documentation-standards/).
* The plugin is 100% [WPCS (WordPress Code Sniffer)](https://github.com/WordPress/WordPress-Coding-Standards) Compliant.
* All classes, functions, and variables are documented so that you know what you need to change.
* The Boilerplate uses a strict file organization scheme that corresponds both to the WordPress Plugin Repository structure, and that makes it easy to organize the files that compose the plugin.
* The project includes a `.pot` file as a starting point for internationalization.

## How to Create a Plugin

The Boilerplate can be installed directly into your plugins folder "as-is". You will want to rename it and the classes and methods inside of it to fit your needs. 
For example, if your plugin is named 'example-me' then:

* rename files from `plugin-name` to `example-me`
* change `plugin_name` to `example_me`
* change `plugin-name` to `example-me`
* change `Plugin_Name` to `Example_Me`
* change `PLUGIN_NAME_` to `EXAMPLE_ME_`

It's safe to activate the plugin at this point. Because the Boilerplate has no real functionality there will be no menu items, meta boxes, or custom post types added until you write the code.

Or, just use the [TukuToi Boilerplate Generator Plugin](https://github.com/TukuToi/tukutoi-plugin-generator), or the Webform (coming soon), to generate a starter plate using your file, class, method names and prefixes.

## Submit a Plugin to WordPress.org

[Comin soon] instructions and example folder boilerplate to use when submitting a plugin to WordPress.

# What About New Features?

Submit your idea to the [Discussions](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) for the community to approve. each Idea needs at least 2 distinct thumbs up (*additional* to the OP) to be considered for implemenation. 
Additionally to the Discussions Post, if you have working code to implement your Idea, please add a PR.
PR'd ideas still need at least 2 additional thumbs up in the Discussion post to be merged. 

Note that in special cases (security, yada yada) we may or may not merge the code and may or may not add or remove features discussed at our own will, independent from the amoung of thumbsup.

## Documentation, FAQs, and More

If you’re interested in writing any documentation or creating tutorials please let's discuss in the [Discussions section](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) of this Repo.


# Credits

The WordPress Plugin Boilerplate was started in 2011 by [Tom McFarlin](http://twitter.com/tommcfarlin/) and has since included a number of great contributions. In March of 2015 the project was handed over by Tom to Devin Vinson.

The version of which the the **Better** WordPress Plugin Boilerplate hard-fork was taken was developed in conjunction with [Josh Eaton](https://twitter.com/jjeaton), [Ulrich Pogson](https://twitter.com/grapplerulrich), and [Brad Vincent](https://twitter.com/themergency).

From 2021-07-5 (July 05th 2021) onwards , the **Better** WordPress Plugin Boilerplate is maintained by [TukuToi](https://www.tukutoi.com/) and the active community.