# DataBrew stream SDK for PHP

PHP SDK provides a simple way to connect to streaming pipelines to receive payment events from created DataBrew's pipelines.

## Installation

```bash
composer install usedatabrew/stream-sdk-php
```

## Usage

```php
<?php

require 'vendor/autoload.php';

use DataBrew\Sdk;

$sdk = new Sdk("api-key");
foreach ($sdk->subscribe("pipelineid")->responses() as $response) {
    echo "Response external PK: " . $response->getExternalPk() . "\n";
}
```