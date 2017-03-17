<?php
require_once DIR . '/apps/AppsCore.php';

class Janome extends AppsCore
{
    public function index()
    {
        $this->displayJanomeForm();
    }

    private function displayJanomeForm()
    {
        $this->display('janome/janome.tpl');
    }

    private function runJanome()
    {
        // CURL
        $ch = curl_init();
        // URL
        $request_url = 'https://api.api.ai/api/query?v=20150910&query='
        . urlencode($this->post['message'])
        . '&lang=ja&sessionId=c623274e-dfa7-4811-93f1-73fc87772a32&timezone=2017-03-16T20:15:18+0900';

        curl_setopt($ch, CURLOPT_URL, $request_url);
        // post data
        if (count($params) > 0) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        }
        // header
        $this->headers = array('Authorization:Bearer ed35aec6e63e4a109a3a1fb7f2c671c4');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        // option
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result =  curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);
        $this->display_data['result'] = $result['result']['fulfillment']['speech'];
        $this->displayJanomeForm();
    }

    public function post()
    {
        $this->display_data['form_data'] = array(
            'message' => $this->post['message']
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
