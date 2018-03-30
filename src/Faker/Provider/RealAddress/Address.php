<?php

namespace Faker\Provider\RealAddress;

use Yomo\AddressFactory\AddressFactory;

class Address extends \Faker\Provider\Address
{

	public static function southAfrica( $cities = [] )
	{
		$factory = new AddressFactory();
		return $factory->makeSouthAfrica(1, $cities )->first();
	}

	public static function britain( $cities = [] )
	{
		$factory = new AddressFactory();
		return $factory->makeBritain(1, $cities )->first();
	}

	public static function france( $cities = [] )
	{
		$factory = new AddressFactory();
		return $factory->makeFrance(1, $cities )->first();
	}

	public static function germany( $cities = [] )
	{
		$factory = new AddressFactory();
		return $factory->makeGermany(1, $cities )->first();
	}

	public static function unitedStatesOfAmerica( $cities = [] )
	{
		$factory = new AddressFactory();
		return $factory->makeUsa(1, $cities )->first();
	}


}