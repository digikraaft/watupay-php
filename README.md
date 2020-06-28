# PHP Implementation of the [Watupay](https://watu.global/) API
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This package provides an expressive and convenient way to interact with the [Watupay](https://watu.global/) API

## Installation

You can install the package via composer:

```bash
composer require digikraaft/watupay-php
```

## Usage

All APIs documented in Watupay's [Documentation](https://docs.watu.global/?version=latest) are currently supported by this package.
Using the individual API follows a general convention so that it can be simple and predictable.

```
<?php 

{API_NAME}::{API_END_POINT}();

```
Before this, the API key needs to be set. For example, to access the `watubill/channels` endpoint,
```
<?php 

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
$bills = Bill::list();

```
You can easily pass parameters to be sent as arguments to the `API_END_POINT` method like this:
```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');

$params = [
    'is_favourite' => 0,
    'country' => 'NG',
    'group' => 'others'
];

$bills = Bill::list($params);

```

This also applies to `POST` requests.

For endpoints that require path parameters like the `fetch bill` with the request `channel/info/bill_id`,
simply pass in a string into the `API_END_POINT` like this:

```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
$bill = Bill::fetch('bill-07');

```

There are a few exceptions to the `API_END_POINT` convention. Details of these are contained in 
[here](../../wiki).

This package returns the exact response from the Watupay API but as the `stdClass` type such that responses can be accessed like this:

```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
$bill = Bill::fetch('bill-07');

if (! $bill->has_error) {
    echo $bill->data->name;
}

```
## Exception Handling   
To handle API exceptions, use the `Digikraaft\Watupay\Exceptions\ApiErrorException` class like this:

```
<?php

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;
use Digikraaft\Watupay\Exceptions\ApiErrorException;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
try{
    Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
    $bill = Bill::fetch('bill-07');
    
    if (! $bill->has_error) {
        echo $bill->data->name;
    }
}catch(ApiErrorException $exception){
    echo $exception->getMessage();
}

```
## Data Encryption
To encrypt sensitive data before sending to the API, use the `WatupayEncryption::encrypt($data, $key, $iv, $blockSize, $mode)` method

## Documentation
For detailed documentation, check the wiki page [here](../../wiki).
Also, check the [Watupay Documentation](https://docs.watu.global/?version=latest) for details on input parameters.

## More Good Stuff
Check [here](https://github.com/digikraaft) for more awesome free stuff!

## Testing
Some tests are against the actual Watupay API, so put in your API, Encryption and IV keys
as shown in the `phpunit.xml.dist` file.

``` bash
composer test
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email dev@digitalkraaft.com instead of using the issue tracker.

## Credits

- [Tim Oladoyinbo](https://github.com/timoladoyinbo)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


