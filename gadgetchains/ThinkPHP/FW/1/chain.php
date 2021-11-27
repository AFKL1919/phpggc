<?php

namespace GadgetChain\ThinkPHP;
use LeagueFlysystemCachedStorageAdapter;

class FW1 extends \PHPGGC\GadgetChain\FileWrite
{
    public static $version = '6.0.x';
    public static $vector = '__destruct';
    public static $author = '???';
    public static $information = '
        只能使用绝对路径
    ';

    public function generate(array $parameters)
    {
        $path = $parameters['remote_path'];
    	$data = $parameters['data'];
        return new \League\Flysystem\Cached\Storage\Adapter($path, $data);
    }
}