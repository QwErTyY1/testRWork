<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.05.2017
 * Time: 14:40
 */
class HomeModel
{

    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


    public function insertArray($table, $array) {

        $fields=array_keys($array);
        $values=array_values($array);
        $fieldlist=implode(',', $fields);
        $qs=str_repeat("?,",count($fields)-1);


        $sql  = "INSERT INTO `".$table."` (".$fieldlist.") VALUES (${qs}?) ";

        $query = $this->db->prepare($sql);

        return $query->execute($values);


    }

    public function deleteById($table, $k, $v)
    {

        $sql = "DELETE FROM $table WHERE $k = $v";
        $query = $this->db->prepare($sql);


        return $query->execute();

    }

    public function updateArray($table, $array, $k, $v)
    {
        $temp = array();
        foreach (array_keys($array) as $name) {
            $temp[] = "`$name` = ?";
        }
        $array_params = implode(', ', $temp);
        $query = "UPDATE `$table`SET ".$array_params." WHERE `$k` = ?";

        $queryData = array_values($array);
        $queryData[] = $v;

        $query = $this->db->prepare($query);
        return $query->execute($queryData);
    }




    public function getAllCountries()
    {
        $sql  = "SELECT * ";
        $sql .= "FROM countries";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }





    public function getCity()
    {
        $sql  = "SELECT * ";
        $sql .= "FROM cities";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getLang()
    {
        $sql  = "SELECT DISTINCT language_id, language_name  ";
        $sql .= "FROM languages";

        $query = $this->db->prepare($sql);
        $query->execute();

        return$query->fetchAll();
    }



    public function getCityByCountryId($country_id)
    {
        $sql  = "SELECT * ";
        $sql .= "FROM cities ";
        $sql .= "WHERE cities.city_country_id = $country_id ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getLangByCountryAndCityById($country_id, $city_id)
    {

        $sql  = "SELECT languages.* ";
        $sql .= "FROM languages ";
        $sql .= "LEFT JOIN countries ";
        $sql .= "ON countries.country_id = languages.language_id_country ";
        $sql .= "LEFT JOIN cities ";
        $sql .= "ON cities.city_id = languages.language_id_city ";
        $sql .= "WHERE countries.country_id = $country_id AND cities.city_id = $city_id";

        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }



    public function getAll()
    {
        $sql  = "SELECT languages.*, countries.*, cities.* ";
        $sql .= "FROM languages ";
        $sql .= "LEFT JOIN countries ";
        $sql .= "ON countries.country_id = languages.language_id_country ";
        $sql .= "LEFT JOIN cities ";
        $sql .= "ON cities.city_id = languages.language_id_city ";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


}