<?php
namespace Laminas\Http\Response {
    class Stream {
        function __construct($remote_path) {
            $this->cleanup = '1';
            $this->streamName = $remote_path;
        }
    }
}
