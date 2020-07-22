<?php
namespace think\model\concern {
    trait Conversion{
    }
    trait Attribute{
    }
	trait RelationShip{
	}
}

namespace think {
    class Model{
        use model\concern\Conversion;
        use model\concern\Attribute;
		use model\concern\RelationShip;
		
        private $data;
        private $withAttr;
		private $relation;
        protected $name;
		protected $strict = true;
		
		function __construct($func, $param)
		{
            $this->data = [$func => $param];
			$this->withAttr = [$func => $func];
			$this->relation = [$func => $func];
			$this->name = $func;
        }
    }
}

namespace think\model {
    use think\Model;
	
    class Pivot extends Model
	{
		//
    }
}

namespace League\Flysystem\Adapter {
	class Local
	{
		protected $pathPrefix;
		
		public function __construct()
		{
			$this->pathPrefix = true;
		}
	}
}

namespace League\Flysystem\Cached\Storage {
	class Adapter
	{
		protected $autosave;
		protected $cache;
		protected $complete;
		protected $adapter;
		protected $file;
		
		public function __construct($func, $param)
		{
			$this->autosave = false;
			$this->cache = [];
			$this->complete = NULL;
			$this->adapter = new \League\Flysystem\Adapter\Local;
			$this->file = new \think\model\Pivot($func, $param);
		}
	}
}