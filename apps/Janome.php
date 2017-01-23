<?php
require_once DIR . '/apps/AppsCore.php';

class Janome extends AppsCore
{
    public function index()
    {
        $this->displayOtrsForm();
    }

    private function displayJanomeForm()
    {
        $this->display('janome/janome.tpl');
    }

    public function post()
    {
        $this->display_data['form_data'] = array(
            'value' => $this->post['value']
        );
        switch ($this->post['submit']) {
            case 'run':
                $this->runJanome();
            break;
            default:
                $this->index();
            break;
        }
    }


    public function __construct()
    {
        parent::__construct();
    }
}
