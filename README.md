Overview
--------

This bundle is a bridge between Symfony2 configuration and [zencoder-php](https://github.com/zencoder/zencoder-php) library.

Installation
------------

Download the dependency via composer

```{r, engine='bash', count_lines}
composer require jcart/zencoder-api-client-bundle
```

Install the bundle into your AppKernel. Add the following line to the bundle defintions:

```php
new JC\ConsulApiClientBundle\JCZencoderApiClientBundle(),
```

Configuration
-------------

The configuration supports configuration the zencoder api.

```
jc_zencoder_api_client:
    host: api.zencoder.com
    secret: your_secret_key
    debug: false
    ca_path: ~
    ca_file: ~
```
Usage
-----

A zencoder service instance is 

For zencoder instance of the Zencoder\Api is injected into the service container with the service id

```
jc_zencoder_api_client.client
```
