# Controller extensions for concrete5

This is a composer package that provides some useful features to be used in
concrete5 controllers. This provides the features as 

In order to use these extensions, you will need to be running PHP 5.4 or newer
in order to take advantage of the traits provided by this package.

## How to use?

Add a composer.json file into your concrete5 package's directory. Into that
file, add the following content:

```
{
    "require": {
        "mainio/c5-controller-extensions": "*"
    }
}
```

And then run `composer install` in the same directory. After this, add the
following on top of your package controller (after the namespace definition):

```php
include(dirname(__FILE__) . '/vendor/autoload.php');
```

After this you can use the extension traits in your controllers as follows:

```php
namespace Concrete\Package\YourPackage\Controller\SinglePage\Dashboard\YourPackage;

defined('C5_EXECUTE') or die("Access Denied.");

// Choose one of these (depending on your use case)
use \Mainio\C5\Twig\Page\Controller\DashboardPageController;
// OR
use \Concrete\Core\Page\Controller\DashboardPageController;

class YourPage extends DashboardPageController
{

    use \Mainio\C5\ControllerExtensions\Controller\Extension\WhatEverExtension;

}
```

Currently the following extensions are provided by this package:

* \Mainio\C5\ControllerExtensions\Controller\Extension\DoctrineEntitiesExtension
* \Mainio\C5\ControllerExtensions\Controller\Extension\FlashMessagesExtension

## License

Licensed under the MIT license. See LICENSE for more information.

Copyright (c) 2015 Mainio Tech Ltd.
