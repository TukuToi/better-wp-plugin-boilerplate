# Better WordPress Plugin Boilerplate ![GitHub contributors](https://img.shields.io/github/contributors/TukuToi/better-wp-plugin-boilerplate) ![GitHub last commit](https://img.shields.io/github/last-commit/TukuToi/better-wp-plugin-boilerplate)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=TukuToi_better-wp-plugin-boilerplate&metric=bugs)](https://sonarcloud.io/dashboard?id=TukuToi_better-wp-plugin-boilerplate) [![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=TukuToi_better-wp-plugin-boilerplate&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=TukuToi_better-wp-plugin-boilerplate) [![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=TukuToi_better-wp-plugin-boilerplate&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=TukuToi_better-wp-plugin-boilerplate) [![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=TukuToi_better-wp-plugin-boilerplate&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=TukuToi_better-wp-plugin-boilerplate) [![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=TukuToi_better-wp-plugin-boilerplate&metric=security_rating)](https://sonarcloud.io/dashboard?id=TukuToi_better-wp-plugin-boilerplate) [PHPUnit](https://github.com/tukutoi/workflow-test/actions/workflows/phpunit.yml/badge.svg) [WPCS](https://github.com/tukutoi/workflow-test/actions/workflows/wpcs.yml/badge.svg)

The Better WordPress Plugin Boilerplate is an advanced starting point for developers looking to create robust and standards-compliant plugins for WordPress and ClassicPress. In a landscape where coding standards and best practices are pivotal, this Boilerplate provides a structured, organized, and modern foundation, ensuring your plugin starts on the right foot.

## Why This Boilerplate?

- **Modern Codebase:** Crafted with modern PHP practices, this Boilerplate adheres to the latest coding standards, promoting maintainability, scalability, and readability.
- **Adherence to WPCS3** Fully complies with the WordPress Coding Standards v3.
- **Community-Driven:** Born from a desire to continue the legacy of a great project, and to foster collaboration and innovation within the community. The Better WordPress Plugin Boilerplate is not just a code repository, but a hub for developers to share, learn, and contribute.
- **Cross-CMS Compatibility:** Designed with both WordPress and ClassicPress in mind, ensuring a broader reach and future-proofing your plugins against the evolving CMS landscape.
- **Quality Assurance:** With 100% test coverage, WordPress Coding Standards compliance, and continuous scanning by SonarCloud, quality is at the forefront, ensuring your plugins are reliable, secure, and ready for the real world.
- **Educational Value:** Besides being a practical tool, this Boilerplate serves as an educational resource, helping developers understand the best practices in WordPress plugin development.
- **Active Maintenance:** Unlike stagnant boilerplates, the Better WordPress Plugin Boilerplate is under active development. With a growing community and a dedication to accepting and reviewing Pull Requests, this project is continually evolving to include the latest best practices and features.

### Qualities

- **Standardised Package Structure:** Conforms to the [Standard PHP package skeleton](https://github.com/php-pds/skeleton) guidelines, ensuring a consistent and organized package structure.
- **Standardised Code Comments:** Adheres to [phpDocumentor](https://docs.phpdoc.org/guide/guides/docblocks.html) standards for doc block compliant code comments, enhancing code readability and maintainability.
- **Requirement Levels Indications:** Utilizes [RFC-2119](https://datatracker.ietf.org/doc/html/rfc2119) for indicating requirement levels, promoting clear and unambiguous communication of requirements.
- **Object-Oriented PHP and Namespaces:** Employs Object-Oriented PHP and Namespaces to enhance code organization and maintainability, fostering a clean and modular codebase.
- **Test Coverage:** Boasts 100% test coverage with [PHPUnit](https://phpunit.de), ensuring robustness and reliability.
- **WordPress Standard Compliant:** Achieves 100% compliance with [WPCS](https://github.com/WordPress/WordPress-Coding-Standards) `WordPress` Standard, promoting WordPress best practices and coding standards.
- **SonarCloud Scanned:** 100% scanned by [SonarCloud](https://sonarcloud.io/projects), ensuring code quality and identifying potential issues.
- **Fully Documented:** Comprehensive documentation covering all aspects of the boilerplate, facilitating ease of use and customization.
- **Cross-CMS Compatibility:** Ensures 100% compatibility with both WordPress _and_ ClassicPress, catering to a wider developer audience.
- **Security:** Prioritizes security, providing a secure foundation for developing WordPress plugins.

# Usage

For detailed documentation on the Plugin usage, and Development processes, please refer to the Documentation.

Note, this repository is not a Plugin you can download and install. The Plugin files instead are _included_ in the `src` folder of this Repository. When releasing your plugin you would have to package the filesof `src` into a folder named accordingly to your plugin.

# Contributing to Better WordPress Plugin Boilerplate

We warmly welcome contributions from the community. Whether you're fixing bugs, improving documentation, or proposing new features, your efforts are highly appreciated. Here's how you can contribute:

## Share Your Ideas

1. Got a suggestion or a new feature idea? Head over to the [Discussions](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) section and share it with the community.
2. For an idea to be considered for implementation, it should receive at least 2 distinct thumbs up (*in addition* to the OP).
   
## Submit Your Code

1. If you have working code to implement your idea, please submit a Pull Request (PR) **to the develop branch**.
2. Ensure that your code follows the PHP and WP coding standards and has passed all the GitHub Actions checks.
3. Your PR should have corresponding discussions post with at least 2 additional thumbs up for it to be merged.

## Code Standards and Practices

1. **Coding Standards:** We follow PHP and WP coding standards to maintain a clean and consistent codebase.
2. **Autoloading:** We utilize Composer's `classmap` autoloading for efficient class loading. We use `classmap` over `psr4` so the WordPress naming standards can be fulfilled.
3. **Versioning:** We adhere to [Semantic Versioning](https://semver.org/) for a clear and predictable versioning scheme.
4. **Changelog:** We maintain a changelog for our project following the [Keep A Changelog](https://keepachangelog.com/en/1.0.0/) standards.

## Special Cases

In special cases related to security, code quality, etc., the maintainers reserve the right to merge or not merge PRs, and to add or remove features at their discretion, regardless of the number of thumbs up a discussion or PR has received.

## Documentation, FAQs, and More

If you’re interested in writing any documentation or creating tutorials please let's discuss in the [Discussions section](https://github.com/TukuToi/better-wp-plugin-boilerplate/discussions) of this Repo.

## Stay Connected

- Join the ongoing discussions to stay updated with the latest proposals and the roadmap.
- Feel free to reach out to the maintainers for any queries.

Your contributions help make Better WordPress Plugin Boilerplate better. Together, let's build a robust, modern, and community-driven boilerplate for WordPress and ClassicPress plugin development!

# Credits

The WordPress Plugin Boilerplate journey commenced in 2011 with [Tom McFarlin](https://twitter.com/tommcfarlin/) at the helm, later transitioning to [Devin Vinson](https://github.com/DevinVinson) in March 2015. The collaboration included noteworthy contributions from [Josh Eaton](https://twitter.com/jjeaton), [Ulrich Pogson](https://twitter.com/grapplerulrich), and [Brad Vincent](https://twitter.com/themergency).

Beginning July 5, 2021, the Better WordPress Plugin Boilerplate found a new home with [TukuToi](https://www.tukutoi.com/) and its vibrant community. This hard-fork, now a standalone project, emerged from a desire to propel the original project forward, amidst a prolonged development hiatus on the original repository.

Our iteration of the Boilerplate not only revives but transcends its predecessor, introducing a plethora of modernized features while retaining a homage to the initial concept and its contributors. The evolution, spurred by community insights and the relentless pursuit of excellence, encapsulates a fresh, modern, and collaborative spirit propelling the WordPress and ClassicPress ecosystems forward.
