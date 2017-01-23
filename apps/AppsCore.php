<?php
class AppsCore
{
    // twig object
    private $twig;

    protected $post;
    protected $display_data = array(
        'debug' => array(),
        'result' => '',
        'message' => ''
    );

    protected function dumpToString($obj)
    {
        ob_start();
        var_dump($obj);
        $ret = ob_get_contents();
        ob_end_clean();
        return $ret;
    }
    protected function dumpToFile($obj, $file_path = '/tmp/nankou_debug.log')
    {
        ob_start();
        var_dump($obj);
        $ret = ob_get_contents();
        ob_end_clean();
        file_put_contents($file_path, "{$ret}\n", FILE_APPEND | LOCK_EX);
    }

    protected function display($tpl_path)
    {
        echo $this->twig->render($tpl_path, $this->display_data);
        exit;
    }

    public function __construct()
    {
        // Twig
        $loader = new Twig_Loader_Filesystem(DIR_TEMPLATES);
        //$twig = new Twig_Environment($loader, array('cache' => DIR . '/twig_cache'));       // 開発用にキャッシュを無効化
        $this->twig = new Twig_Environment($loader, array());
        // post data
        $this->post = $_POST;
    }
}
