# components

[![Build Status](https://travis-ci.org/beloop/components.png?branch=master)](http://travis-ci.org/beloop/components)
[![Latest Stable Version](https://poser.pugx.org/beloop/components/v/stable)](https://packagist.org/packages/beelop/components)

beloop components for LMS

beloop components is a suite of Learning Management System Components and Bundles built on top of Symfony
and under [MIT](http://opensource.org/licenses/MIT) license.
It aims to promote SOLID principles, efficient code reuse, separation of 
concerns as effective building blocks for the development of LMS 
applications.

beloop provides a reference implementation for the basic core components found
in LMS web projects.

## Requirements

beloop is supported on PHP 5.5.* and up.

## Getting started

beloop consists of a set of individual [components](src/Beloop/Component).
This means that instead of installing something like a "Beloop framework", you actually pick only the components that you need.

This project follows [SemVer](https://semver.org/) for all its stable components.
The recommended way to install these components is [through Composer](https://getcomposer.org).
[New to Composer?](http://getcomposer.org/doc/00-intro.md)

For example, this may look something like this:

```bash
# recommended install: pick required components
$ composer require beloop/core beloop/course
```

## Tests

To run the test suite, you first need to clone this repo and then install all
dependencies [through Composer](https://getcomposer.org):

```bash
$ composer install
```

To run the test suite, go to the project root and run:

```bash
$ php vendor/bin/phpunit
```
