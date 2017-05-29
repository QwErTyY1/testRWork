<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.05.2017
 * Time: 15:42
 */
class View
{
    private $data = array();

    private $template = null;




    public function __construct($template)
    {


        $file = APP .'/view/'.$template.'.php';

        if (file_exists($file)) {
            $this->template = $file;
        } else {
            echo "File not fount";
        }


    }

    public function assign($variable = null, $value = null)
    {
        $this->data[$variable] = $value;
    }


    public function display()
    {

        $file = $this->template;

        require_once APP .'/view/_templates/header.php';
        extract($this->data);

        ob_start();
        {
         require_once $file;
        }
        ob_end_flush();
        require_once APP .'/view/_templates/footer.php';
    }



}
