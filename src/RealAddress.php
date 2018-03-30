<?php

namespace Yomo\AddressFactory;

use Geocoder\Model\Bounds;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;

/**
 * Class AddressFactory
 *
 * @package     Yomo\AddressFactory
 *
 * @author      Stuart Steedman
 * @date        29 October 2017
 *
 */
class RealAddress
{

	/**
	 * @var \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	protected $addresses;


	protected $countryMapping = [
		'SouthAfrica' => 'South Africa',
		'Usa'         => 'United States of America',
		'Britain'     => 'Great Britain',
		'France'      => 'France',
		'Germany'     => 'Germany',
	];


	public function __construct ()
	{
		$this->addresses = collect();
	}


	/**
	 * @param $name
	 * @param $arguments
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function __call ( $name, $arguments )
	{
		if ( strpos( $name, 'make' ) === 0 ) {
			return $this->make( $arguments[ 0 ], $this->countryMapping[ substr( $name, 4, strlen( $name ) - 4 ) ], array_key_exists( 1, $arguments ) ? $arguments[ 1 ] : null );
		}
	}


	/**
	 * @param int               $count
	 * @param null|string|array $locations
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function makeSouthAfrica ( $count, $locations = null )
	{
		return $this->make( $count, 'SouthAfrica', $locations );
	}

	/**
	 * @param int               $count
	 * @param null|string|array $locations
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function makeUsa ( $count, $locations = null )
	{
		return $this->make( $count, 'UnitedStatesOfAmerica', $locations );
	}

	/**
	 * @param int               $count
	 * @param null|string|array $locations
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function makeFrance ( $count, $locations = null )
	{
		return $this->make( $count, 'France', $locations );
	}

	/**
	 * @param int               $count
	 * @param null|string|array $locations
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function makeGermany ( $count, $locations = null )
	{
		return $this->make( $count, 'Germany', $locations );
	}

	/**
	 * @param int               $count
	 * @param null|string|array $locations
	 *
	 * @return \Illuminate\Support\Collection|\Geocoder\Model\Address[]
	 */
	public function makeBritain ( $count, $locations = null )
	{
		return $this->make( $count, 'GreatBritain', $locations );
	}


	/**
	 * @param int                                              $count     The number of addresses to be generated
	 * @param string                                           $country   The country of the addresses.
	 * @param null|string|array|\Illuminate\Support\Collection $locations Optional locations, or array of locations, to filter by (such as cities, provinces,
	 *                                                                    states etc.)
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function make ( $count, $country, $locations = null )
	{

		if ( $cnfCountry = Config::get( 'realaddress.' . kebab_case( $country ), false ) ) {

			if ( is_null( $locations ) ) $locations = $cnfCountry[ 'cities' ];
			if ( is_string( $locations ) ) $locations = [ $locations ];

			for ( $i = 0; $i < $count; $i++ ) {

				$query = implode( ', ', [ array_random( $locations ), $country ] );

				/** @var \Geocoder\Model\Address $country */
				$lookup = app( 'geocoder' )->geocode( $query )->get()->first();

				if ( $lookup->getLocality() ) {
					/** @var \Geocoder\Model\Address $address */
					$address = null;

					while ( empty( $address ) || !$address->getStreetName() || !$address->getStreetNumber() ) {
						$random  = $this->getRandomCoordinates( $lookup->getBounds() );
						$address = $this->performLookup( ... $random );
					}

					$this->addresses->push( $address );
				}

			}


		}

		return $this->addresses;
	}


	protected function performLookup ( $lat, $lng )
	{
		/** @var \Geocoder\Model\Address $address */
		$address = app( 'geocoder' )->reverse( $lat, $lng )->get()->first();

		return $address;
	}


	protected function getRandomCoordinates ( Bounds $bounds )
	{
		$lat = $this->randomFloat( 6, $bounds->getNorth(), $bounds->getSouth() );
		$lng = $this->randomFloat( 6, $bounds->getEast(), $bounds->getWest() );

		return [ $lat, $lng ];
	}


	/**
	 * Return a random float number
	 *
	 * @param int       $nbMaxDecimals
	 * @param int|float $min
	 * @param int|float $max
	 *
	 * @example 48.8932
	 *
	 * @return float
	 */
	private function randomFloat ( $nbMaxDecimals, $min, $max )
	{

		if ( $min > $max ) {
			$tmp = $min;
			$min = $max;
			$max = $tmp;
		}

		return round( $min + mt_rand() / mt_getrandmax() * ( $max - $min ), $nbMaxDecimals );
	}

}
