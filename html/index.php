<?php
// init
require_once './init.php';

class Router
{
    private $get;

    public function run()
    {
        $class_name = 'Janome';
        $method_name = 'index';
        if (!$this->isGetDataExists() || !$this->isClassExists()) {
            require_once DIR . '/apps/Janome.php';
            $object = new $class_name();
            $object->$method_name();
            exit;
        }
        $class_name = $this->get['class'];
        $object = new $class_name();

        if ($this->isMethodExists($object)) {
            $method_name = $this->get['method'];
        }
        $object->$method_name();
    }

    private function isGetDataExists()
    {
        if (isset($this->get['class']) && isset($this->get['method'])) {
            return true;
        } else {
            return false;
        }
    }
    private function isClassExists()
    {
        $file_name = DIR . '/apps/' . $this->get['class'] . '.php';
        if (!file_exists($file_name)) {
            return false;
        }
        require_once $file_name;
        if (!class_exists($this->get['class'])) {
            return false;
        }
        return true;
    }
    private function isMethodExists($object)
    {
        if (!method_exists($object, $this->get['method'])) {
            return false;
        }
        return true;
    }

    public function __construct()
    {
        $this->get = $_GET;
    }
}

$router = new Router();
$router->run();
