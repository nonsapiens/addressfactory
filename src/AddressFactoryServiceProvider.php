<?php

namespace Yomo\AddressFactory;

use Faker\Generator;
use Faker\Provider\RealAddress\Address;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class AddressFactoryServiceProvider extends ServiceProvider
{


	public function boot ( Request $request, \Illuminate\Routing\Router $router )
	{

		# Config file vendor publishing
		$configPath = realpath( dirname( __FILE__ ) . '/../config/addressfactory.php' );

		$this->publishes( [ $configPath => config_path( 'addressfactory.php' ) ], 'yomo.addressfactory' );
		$this->mergeConfigFrom( $configPath, 'addressfactory' );

		# Adds the new Faker Provider
		$faker = new Generator();
		$faker->addProvider( Address::class );
	}


}
