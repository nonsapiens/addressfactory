<?php

namespace Nonsapiens\AddressFactory;

use Faker\Generator;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Nonsapiens\AddressFactory\Faker\AddressFactoryFaker;

/**
 * Class AddressFactoryServiceProvider
 * @package Nonsapiens\AddressFactory
 */
class AddressFactoryServiceProvider extends ServiceProvider
{

    /**
     * @param Request $request
     * @param \Illuminate\Routing\Router $router
     */
	public function boot ( Request $request, \Illuminate\Routing\Router $router )
	{

		# Config file vendor publishing
		$configPath = realpath( dirname( __FILE__ ) . '/../config/realaddress.php' );

		$this->publishes( [ $configPath => config_path( 'realaddress.php' ) ], 'yomo.realaddress' );
		$this->mergeConfigFrom( $configPath, 'realaddress' );

	}

    /**
     *
     */
	public function register ()
	{
		$this->app->bind( Generator::class, function ( $app ) {

			$faker = \Faker\Factory::create( config('app.faker_locale', 'en_US') );
			$faker->addProvider( new AddressFactoryFaker( $faker ) );

			return $faker;
		} );

	}


}
