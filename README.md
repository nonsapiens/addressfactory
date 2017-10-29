# Address Factory
## About
This nifty library for Laravel 5+ intelligently generates real-world addresses for you to use in your database seeding, unit tests, or anything else.

## Installation
Require this package with composer using the following command:
```
composer require yomo/addressfactory
```

After updating composer, add the service provider to the `providers` array in `config/app.php`
```php
Yomo\AddressFactory\AddressFactoryServiceProvider::class
```

## Usage
```php
$f = new \Yomo\AddressFactory\AddressFactory();
$southAfricanPoints = $f->makeSouthAfrica(4);                # Generates 4 locations within South Africa's major cities
$capeTownPoints     = $f->makeSouthAfrica(2, 'Cape Town');   # Generates 2 locations from Cape Town, South Africa
$multiPoints        = $f->makeSouthAfrica(3, ['Pretoria', 'Johannesburg']);
```

If you want to extend AddressFactory to include your country, make sure your `config/addressfactory.php` is present by running:

```
php artisan vendor:publish --tag=yomo.addressfactory
```

Then, add your country to the array, being sure to include the names of major cities, as AddressFactory uses this to generate random locations against, e.g.

```php
'kenya' => [
		'cities' => [ 'Nairobi', 'Mombasa' ],
	],
```

You can then perform a search with:

```php
$f = new \Yomo\AddressFactory\AddressFactory();
$kenyaPoints = $f->make(2, 'Kenya');                  # Generates 2 locations from Kenya
$nairobiPoints = $f->make(1, 'Kenya', 'Nairobi');     # Generates a location from Nairobi
```
