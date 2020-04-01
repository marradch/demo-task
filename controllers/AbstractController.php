<?php

namespace Controllers;

abstract class AbstractController
{
    public function render($templateName, $params = [])
    {
        extract($params);
        include('views\\layout.php');
    }

    function __call($arg1, $arg2)
    {
        $className = get_class($this);
        throw new \Exception("method \"$arg1\" not found in controller \"$className\"");
    }
}