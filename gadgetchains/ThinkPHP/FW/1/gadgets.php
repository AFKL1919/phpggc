<?php 
namespace League\Flysystem\Adapter {
    abstract class AbstractAdapter {
        protected $pathPrefix;
        function __construct()
        {
            $this->pathPrefix = '/';
        }
    }
    class Local extends AbstractAdapter{

    }
}

namespace League\Flysystem\Cached\Storage {
    use \League\Flysystem\Adapter\Local;
    abstract class AbstractCache{
        protected $autosave = false;
        protected $cache = [];
        function __construct($code)
        {
            $this->autosave = false;
            $this->cache = ["axin"=>$code];
        }
    }

    class Adapter extends AbstractCache{
        protected $adapter;
        protected $file;
        function __construct($path, $code)
        {
            parent::__construct($code);
            $this->adapter = new \League\Flysystem\Adapter\Local();
            $this->file = $path;
        }
    }
}
