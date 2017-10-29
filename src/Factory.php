<?php

namespace Yomo\AddressFactory;

class AddressFactory
{

	public function make ( $count, $country, $city = null )
	{
		$query = implode(', ', [$country, $city]);

		app('geocoder')->geocode($query)->get();
	}




	protected function getRandomCoordinates ($topLeft, $bottomRight)
	{

	}

}