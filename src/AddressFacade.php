<?php

namespace Nonsapiens\AddressFactory;

use Illuminate\Support\Facades\Facade;

class AddressFacade extends Facade
{

    /**
     * @return string
     */
	protected static function getFacadeAccessor()
	{
		return AddressFactory::class;
	}

}