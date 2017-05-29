<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.05.2017
 * Time: 14:40
 */
class Home extends Controller
{

    public function index()
    {




        $date = $this->model->getAll();

        $get_country = $this->model->getAllCountries();

        $items = ['date'=>$date,
                    'list_countries' => $get_country,
            ];

        $this->watch('home/index',"list",$items);

    }



    public function delete()
    {


        $message['confirm'] = "";

        $table = "";
        $key = "";

        $id = $this->test_input($_POST['id']);
        $attr = $this->test_input($_POST['attr']);

        $this->model->deleteById("countries", "country_id", $id);


        switch ("countryD"){
            case "countryD":
                $table = "countries";
                $key = "country_id";
                break;
            case "cityD":
                $table = "cities";
                $key = "city_id";
                break;
            case "languageD":
                $table = "languages";
                $key = "language_id";
                break;
        }


        if ($this->model->deleteById($table, $key, $id)){
            $message['confirm'] = "<div class='alert alert-success'><strong>Success delete!</strong></div>";
        } else {
            $message['confirm'] = "<div class='alert alert-warning'><strong>Warning delete!</strong></div>";
        }


        $list['date'] = $this->model->getAll();

        ob_start();
        {
            require_once APP.'/view/_block/home_block.php';
        }
        ob_end_flush();

    }

    public function adding()
    {

        $message['confirm'] = "";



        $data = [];
        $type = "";

        $action = $this->test_input($_POST['action']);

        $myCountryTid = 0;

        if (substr($action,-3) == is_string("add") ) {
            switch ($action){
                case "city_add":
                    $type = "cities";
                    $newCity = $this->test_input($_POST['CityName']);
                    $country_gid = $this->test_input($_POST['county_gid']);
                    $data = ['city_name'       => $newCity,
                        'city_country_id' => $country_gid,
                    ];
                    break;
                case "country_add":
                    $type = "countries";
                    $dCountry = $this->test_input($_POST['CountryName']);
                    $data = ['country_name' => $dCountry];
                    break;
                case "language_add":
                    $type = "languages";
                    $dC = $this->test_input($_POST['county_gid']);
                    $dCity = $this->test_input($_POST['city_gid']);
                    $language_name = $this->test_input($_POST['LangName']);
                    $data = ['language_name'  => $language_name,
                        'language_id_city' => $dCity,
                        'language_id_country' => $dC,
                    ];
                    break;
            }

            if (!empty($data)){
                if ($this->model->insertArray($type, $data)){
                    $message['confirm'] = "<div class='alert alert-success'><strong>Your information add!</strong></div>";
                } else {
                    $message['confirm'] = "<div class='alert alert-warning'><strong>Your information not add!</strong></div>";
                }
            }
        }

        $list['date'] = $this->model->getAll();

        $this->getAjax($message['confirm']);


    }



    public function searchForm(){

        $iddd = (isset($_POST['idC']))? $_POST['idC']:'';
        $attr = (isset($_POST['attr']))? $_POST['attr']:'';

        ob_start();
        {
            require_once APP.'/view/_block/modal_content_block.php';
        }
        ob_end_flush();


    }


    public function getAjax($message)
    {
        $list['date'] = $this->model->getAll();


        header("Content-Type: application/json");

        ob_start();

        extract($list);
        require  APP.'/view/_block/home_block.php';

        $output = ob_get_contents();
        ob_clean();

        ob_start();
        $list['list_countries'] =$this->model->getAllCountries();
        require APP.'/view/_block/country_block.php';

        extract($message);

        extract($list);

        $countries = ob_get_contents();
        ob_clean();

        echo json_encode(array('ones'=> $output,
            'two' =>$countries,
        ));
    }


    public function update()
    {

        $message['confirm'] = "";

        $data = [];

        $typeTable = "";

        $id = "country_id";

        $attr = $this->test_input($_POST['attr']);

        $editName = $this->test_input($_POST['editName']);


        $idC = $this->test_input($_POST['id']);



        switch ($attr){
            case "country":
                $id = "country_id";
                $typeTable = "countries";
                $data = ['country_name' => $editName];
                break;
            case "city":

                $id = "city_id";
                $typeTable = "cities";
                $data = ['city_name' => $editName];
                break;
            case "language":

                $id = "language_id";
                $typeTable = "languages";
                $data = ['language_name' => $editName];
                break;

        }
            if (!empty($idC) && !empty($typeTable)) {

        if (!empty($editName)) {

        if ($this->model->updateArray($typeTable, $data, $id,$idC)){
            $message['confirm'] = "<div class='alert alert-success'><strong>'$typeTable' update!</strong></div>";

        } else {
            $message['confirm'] = "<div class='alert alert-warning'><strong>Your information not update!</strong></div>";
        }
    } else {
            $message['confirm'] = "<div class='alert alert-warning'><strong>One of the fields is empty!</strong></div>";
        }
    } else {
            $message['confirm'] = "<div class='alert alert-warning'><strong>Select an item to edit!</strong></div>";
            }
        $list['date'] = $this->model->getAll();

        ob_start();
        {
            require_once APP.'/view/_block/home_block.php';
        }
        ob_end_flush();




    }


    public function getCity()
    {
        $country_id = intval($_POST['country_id']);

        $city_lists = $this->model->getCityByCountryId($country_id);
        $list['city_list'] = $city_lists;


        ob_start();
        {
            require_once APP.'/view/_block/city_block.php';
        }
        ob_end_flush();

    }

    public function getLanguage()
    {
        $country_id = intval($_POST['country_id']);
        $city_id = intval($_POST['city_id']);
        $language_list = $this->model->getLangByCountryAndCityById($country_id, $city_id);
        $list['language_list'] = $language_list;

        ob_start();
        {

            require_once APP.'/view/_block/language_block.php';
        }
        ob_end_flush();
    }


    public function modalMyAddCity()
    {
        $get_country = $this->model->getAllCountries();

        $list['list_countries'] = $get_country;

        ob_start();
        {
            require_once APP.'/view/_block/modalMyAddCity_block.php';
        }
        ob_end_flush();

    }


}