<?php

abstract class ACore {

    protected $db;

    public function __construct()
    {
        $this->db = mysqli_connect(HOST,USER,PASSWORD);
        if (!$this->db){
            exit("Помилка зєднання з базою даних" . mysqli_error());
        }
        if (!mysqli_select_db($this->db, DB)){
            exit("Немає такої бази даних" . mysqli_error());
        }
        mysqli_query("SET NAMES 'UTF8'");
    }

    protected function get_header(){
        include "header.php";
    }

    protected function get_left_bar(){

    }



    public function get_body(){
        $this->get_header();
    }
}










?>