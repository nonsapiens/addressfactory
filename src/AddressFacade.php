<?php

namespace Nonsapiens\AddressFactory\Facades;

use Illuminate\Support\Facades\Facade;

class RealAddress extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'Nonsapiens\AddressFactory\AddressFactory';
	}

}