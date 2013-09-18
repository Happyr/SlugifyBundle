HappyR SlugifyBundle
=====================

This bundle provides integration of the [URLify](https://github.com/jbroadway/urlify) library into Symfony2.
A slugify service and twig filter is provided. This bundle is a modified version of the
[ZenstruckSlugifyBundle](https://github.com/kbond/ZenstruckSlugifyBundle). The ZenstruckSlugifyBundle uses the
[Slugify](https://github.com/cocur/slugify) library.

## Installation

1. Install with composer:

    ```
    php composer.phar require happyr/slugify-bundle
    ```

2. Enable the bundle:

    ```php
    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new HappyR\SlugifyBundle\HappyRSlugifyBundle(),
        );
    }
    ```

## Using the service

```php

$slugifier = $this->container->get('happyr.slugify.slugifier');
$text = $slugifier->slugify('Hello World!');
echo $text; //prints "hello-world"
```

## Using the Twig filter

```html
{{ 'Hello World!'|slugify }} {# hello-world #}

```

## Full Default Configuration

```yaml
happy_r_slugify:
    twig: false #set to true to enable twig filter
```