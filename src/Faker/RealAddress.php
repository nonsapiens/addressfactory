<?php

namespace Yomo\AddressFactory\Faker;


use Yomo\AddressFactory\RealAddress;

class FakerRealAddress extends \Faker\Provider\Address
{

	public function realAddress( $country, $cities = null )
	{
		$factory = new RealAddress();

		return $factory->make(1, $country, $cities )->first();
	}

	public function southAfricanAddress( $cities = null )
	{
		$factory = new RealAddress();

		return $factory->makeSouthAfrica(1, $cities )->first();
	}

	public function britishAddress( $cities = null )
	{
		$factory = new RealAddress();
		return $factory->makeBritain(1, $cities )->first();
	}

	public function frenchAddress( $cities = null )
	{
		$factory = new RealAddress();
		return $factory->makeFrance(1, $cities )->first();
	}

	public function germanAddress( $cities = null )
	{
		$factory = new RealAddress();
		return $factory->makeGermany(1, $cities )->first();
	}

	public function usaAddress( $cities = null )
	{
		$factory = new RealAddress();
		return $factory->makeUsa(1, $cities )->first();
	}


}
