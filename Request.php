<?php

namespace Partiel;

include 'Response.php';

class Request
{
    private $serverProjectName;
    private $controller;
    private $action;
    private $param = array();

    public function __construct($serverProjectName, $controller, $action, array $param)
    {
        $this->serverProjectName = $serverProjectName;
        $this->controller = $controller;
        $this->action = $action;
        $this->param = $param;
    }

    public function getController()
    {
        return $this->controller;
    }

 
    public function setController($controller)
    {
        $this->controller = $controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function getParam()
    {
        return $this->param;
    }


    public function setParam($param)
    {
        $this->param = $param;
    }

    public function getServerProjectName()
    {
        return $this->serverProjectName;
    }

    public function setServerProjectName($serverProjectName)
    {
        $this->serverProjectName = $serverProjectName;
    }


}
