<?php error_reporting(0);

class Controller
{

    public $db = null;

    public $model = null;

    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }


    protected function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    private function openDatabaseConnection()
    {

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }


    public function loadModel()
    {
        require APP . 'model/HomeModel.php';


        $this->model = new HomeModel($this->db);
    }

    public function watch($puth, $variable = '', $val = '')
    {

        $view = new View($puth);

        $view->assign($variable, $val);
        $view->display();


    }

}
