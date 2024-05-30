# Scalar Doc Bundle

A Symfony bundle for API Platform to create modern API docs automatically from the OpenAPI specification.

## Installation

1. Install via composer

```
composer require everbit-software/scalar-doc-bundle
```

or via GitHub and add the following to `composer.json`

```json
   "require": {
	...
        "everbit-software/scalar-doc-bundle": "dev-main"
    },
    "repositories": [
	...
        {
            "type": "git",
            "url": "https://github.com/everbit-software/scalar-doc-bundle.git"
        }
  
    ],
```

3. Add the bundle to `bundles.php`

```php
<?php

return [
    ...
    Everbit\Bundle\ScalarDocBundle\ScalarDocBundle::class => ['all' => true]
];
```

3. Go to /docs/modern to view the docs
