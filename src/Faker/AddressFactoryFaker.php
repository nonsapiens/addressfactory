<?php

namespace Nonsapiens\AddressFactory\Faker;

use Nonsapiens\AddressFactory\AddressFactory;

/**
 * Class AddressFactoryFaker
 * @package Nonsapiens\AddressFactory\Faker
 */
class AddressFactoryFaker extends \Faker\Provider\Address
{

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function realAddress( $country, $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->make(1, $country, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function southAfricanAddress( $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->makeSouthAfrica(1, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function britishAddress( $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->makeBritain(1, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function frenchAddress( $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->makeFrance(1, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function germanAddress( $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->makeGermany(1, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function usaAddress( $cities = null )
	{
		$factory = new AddressFactory();

		return $factory->makeUsa(1, $cities )->first();
	}

    /**
     * @param $country
     * @param null $cities
     * @return mixed
     */
	public function russianAddress($cities = null)
	{
		$factory = new AddressFactory();

		return $factory->makeRussian(1, $cities )->first();
	}


}
