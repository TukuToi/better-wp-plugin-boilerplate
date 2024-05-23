# Contributing to Better WordPress Plugin Boilerplate

We warmly welcome contributions from the community. Whether you're fixing bugs, improving documentation, or proposing new features, your efforts are highly appreciated. Here's how you can contribute:

## Share Your Ideas

1. Got a suggestion or a new feature idea? Head over to the [Discussions](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) section and share it with the community.
2. For an idea to be considered for implementation, it should receive at least 2 distinct thumbs up (*in addition* to the OP).
   
## Submit Your Code

1. If you have working code to implement your idea, please submit a Pull Request (PR) **to the develop branch** from your fork.
2. Ensure that your code follows the PHP and WP coding standards and has passed all the GitHub Actions checks.
3. Your PR should have corresponding discussions post with at least 2 additional thumbs up for it to be merged.

## Code Standards and Practices

1. **Coding Standards:** We follow PHP and WP coding standards to maintain a clean and consistent codebase.
2. **Autoloading:** We utilize Composer's `classmap` autoloading for efficient class loading. We use `classmap` over `psr4` so the WordPress naming standards can be fulfilled.
3. **Versioning:** We adhere to [Semantic Versioning](https://semver.org/) for a clear and predictable versioning scheme.
4. **Changelog:** We maintain a changelog for our project following the [Keep A Changelog](https://keepachangelog.com/en/1.0.0/) standards.
5. We follow the [PHP Package Development Standards](http://php-pds.com) for file and folder structures and naming.

## Development flow

When a release is made, our GitHub workflows automatically will build the autoloader and add dependencies declared in the composer.json file.
If you are to add new dependencies, or want to build the autoloader locally, you need composer.
- `composer install`

Note that all autoload classes from the main plugin will be autoloaded from `$base_dir/src/src` when you build locally.
Manually replace `/src/src` to `/src/` if you want to test the plugin prior to pushing.

If you are cloning this repo, or a fork of this repo locally, and want to run some of the tests we run on the repo, and ensure your code will pass, you can follow these steps:

- install PHPUnit `composer require --dev phpunit/phpunit:^9.0`
- install [WP Unit Tests](https://make.wordpress.org/core/handbook/testing/automated-testing/phpunit/) 
- edit phpunit.xml file adequately
- install WPCS (Standard: WordPress)

_Any of the above steps are optional but highly recommended_

## Special Cases

In special cases related to security, code quality, etc., the maintainers reserve the right to merge or not merge PRs, and to add or remove features at their discretion, regardless of the number of thumbs up a discussion or PR has received.

## Documentation, FAQs, and More

If you’re interested in writing any documentation or creating tutorials please let's discuss in the [Discussions section](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) of this Repo.

## Stay Connected

- Join the ongoing discussions to stay updated with the latest proposals and the roadmap.
- Feel free to reach out to the maintainers for any queries.

Your contributions help make Better WordPress Plugin Boilerplate better. Together, let's build a robust, modern, and community-driven boilerplate for WordPress and ClassicPress plugin development!