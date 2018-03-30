<?php

namespace Yomo\AddressFactory\Facades;

use Illuminate\Support\Facades\Facade;

class RealAddress extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'Yomo\AddressFactory\RealAddress';
	}

}