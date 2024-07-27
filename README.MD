# DataBrew stream SDK for PHP

PHP SDK provides a simple way to connect to streaming pipelines to receive payment events from created DataBrew's pipelines.

## Installation

```bash
composer install usedatabrew/stream-sdk-php
```

## Subscribe to stream

```php
<?php

require 'vendor/autoload.php';

use DataBrew\Sdk;
use DataBrew\Options;

$opts = new Options();
$opts->setApiKey("api-key");


$sdk = new Sdk($opts);
foreach ($sdk->subscribe("pipelineid")->responses() as $response) {
    echo "Response external PK: " . $response->getExternalPk() . "\n";
}
```

## Extend list of connected accounts in case of Stripe Connect usage

```php
<?php

require 'vendor/autoload.php';

use DataBrew\Sdk;
use DataBrew\Options;

$opts = new Options();
$opts->setApiKey("api-key");

$catalogId = 1;
$accounts = ["test"];


$sdk = new Sdk($opts);
$response = $sdk->addStripeConnectedAccounts($catalogId, $accounts);
var_dump($response);
```