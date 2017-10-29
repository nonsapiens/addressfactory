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

As this library relies on Google Maps, your Google Maps API key needs to be defined in your `.env` file:
```
GOOGLE_MAPS_API_KEY=abcdefghijklmnopqrstuv
```
If you don't have an API key (they're free), [get one here](https://developers.google.com/maps/documentation/javascript/get-api-key)

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

The `make` function returns a Collection of objects containing the address details:

```
Collection {#242 ▼
  #items: array:4 [▼
    0 => GoogleAddress {#454 ▼
      -id: "Ek0zMiBSb3Nld29ydGh5IExuLCBDb3Jud2FsbCBIaWxsIENvdW50cnkgRXN0YXRlLCBDZW50dXJpb24sIDAxNzgsIFNvdXRoIEFmcmljYQ"
      -locationType: "RANGE_INTERPOLATED"
      -resultType: array:1 [▶]
      -formattedAddress: "32 Roseworthy Ln, Cornwall Hill Country Estate, Centurion, 0178, South Africa"
      -streetAddress: null
      -intersection: null
      -political: "South Africa"
      -colloquialArea: null
      -ward: null
      -neighborhood: null
      -premise: null
      -subpremise: null
      -naturalFeature: null
      -airport: null
      -park: null
      -pointOfInterest: null
      -establishment: null
      -subLocalityLevels: AdminLevelCollection {#455 ▶}
      -coordinates: Coordinates {#446 ▶}
      -bounds: Bounds {#447 ▶}
      -streetNumber: "32"
      -streetName: "Roseworthy Lane"
      -subLocality: "Cornwall Hill Country Estate"
      -locality: "Centurion"
      -postalCode: "0178"
      -adminLevels: AdminLevelCollection {#452 ▶}
      -country: Country {#450 ▶}
      -timezone: null
      -providedBy: "google_maps"
    }
    1 => GoogleAddress {#313 ▼
      -id: "ChIJN8CKLdZllR4RpbX9yUeMYFM"
      -locationType: "ROOFTOP"
      -resultType: array:1 [▶]
      -formattedAddress: "3 Boca Loop, Centurion Golf Estate, Centurion, 0046, South Africa"
      -streetAddress: null
      -intersection: null
      -political: "South Africa"
      -colloquialArea: null
      -ward: null
      -neighborhood: null
      -premise: null
      -subpremise: null
      -naturalFeature: null
      -airport: null
      -park: null
      -pointOfInterest: null
      -establishment: null
      -subLocalityLevels: AdminLevelCollection {#323 ▶}
      -coordinates: Coordinates {#303 ▶}
      -bounds: Bounds {#304 ▶}
      -streetNumber: "3"
      -streetName: "Boca Loop"
      -subLocality: "Centurion Golf Estate"
      -locality: "Centurion"
      -postalCode: "0046"
      -adminLevels: AdminLevelCollection {#311 ▶}
      -country: Country {#310 ▶}
      -timezone: null
      -providedBy: "google_maps"
    }
    2 => GoogleAddress {#472 ▼
      -id: "EkI4MCBKYW4gU211dHMgQXZlLCBEb29ybmtsb29mIDM5MS1KciwgQ2VudHVyaW9uLCAwMDYyLCBTb3V0aCBBZnJpY2E"
      -locationType: "RANGE_INTERPOLATED"
      -resultType: array:1 [▶]
      -formattedAddress: "80 Jan Smuts Ave, Doornkloof 391-Jr, Centurion, 0062, South Africa"
      -streetAddress: null
      -intersection: null
      -political: "South Africa"
      -colloquialArea: null
      -ward: null
      -neighborhood: null
      -premise: null
      -subpremise: null
      -naturalFeature: null
      -airport: null
      -park: null
      -pointOfInterest: null
      -establishment: null
      -subLocalityLevels: AdminLevelCollection {#471 ▶}
      -coordinates: Coordinates {#464 ▶}
      -bounds: Bounds {#453 ▶}
      -streetNumber: "80"
      -streetName: "Jan Smuts Avenue"
      -subLocality: "Doornkloof 391-Jr"
      -locality: "Centurion"
      -postalCode: "0062"
      -adminLevels: AdminLevelCollection {#469 ▶}
      -country: Country {#470 ▶}
      -timezone: null
      -providedBy: "google_maps"
    }
    3 => GoogleAddress {#267 ▼
      -id: "ChIJV7eXM3pmlR4Rx8fcT2j22N4"
      -locationType: "ROOFTOP"
      -resultType: array:1 [▶]
      -formattedAddress: "45 Laurence Ln, Irene Security Estate, Centurion, 0062, South Africa"
      -streetAddress: null
      -intersection: null
      -political: "South Africa"
      -colloquialArea: null
      -ward: null
      -neighborhood: null
      -premise: null
      -subpremise: null
      -naturalFeature: null
      -airport: null
      -park: null
      -pointOfInterest: null
      -establishment: null
      -subLocalityLevels: AdminLevelCollection {#284 ▶}
      -coordinates: Coordinates {#273 ▶}
      -bounds: Bounds {#296 ▶}
      -streetNumber: "45"
      -streetName: "Laurence Lane"
      -subLocality: "Irene Security Estate"
      -locality: "Centurion"
      -postalCode: "0062"
      -adminLevels: AdminLevelCollection {#410 ▶}
      -country: Country {#299 ▶}
      -timezone: null
      -providedBy: "google_maps"
    }
  ]
}
```
