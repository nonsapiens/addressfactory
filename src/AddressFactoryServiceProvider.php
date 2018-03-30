<?php

namespace Yomo\AddressFactory;

use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Yomo\AddressFactory\Faker\FakerRealAddress;

class AddressFactoryServiceProvider extends ServiceProvider
{


	public function boot ( Request $request, \Illuminate\Routing\Router $router )
	{

		# Config file vendor publishing
		$configPath = realpath( dirname( __FILE__ ) . '/../config/addressfactory.php' );

		$this->publishes( [ $configPath => config_path( 'realaddress.php' ) ], 'yomo.realaddress' );
		$this->mergeConfigFrom( $configPath, 'realaddress' );

	}


	public function register ()
	{
		$this->app->bind( Generator::class, function ( $app ) {

			$faker = \Faker\Factory::create();
			$faker->addProvider( new FakerRealAddress( $faker ) );

			return $faker;
		} );

	}


}
