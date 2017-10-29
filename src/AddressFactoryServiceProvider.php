<?php

namespace Yomo\AddressFactory;

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

	}


}
