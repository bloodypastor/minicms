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

    }

    protected function get_header(){
        include "header.php";
    }

    protected function get_left_bar(){
        $query = "SELECT id_category,name_category FROM category";

        $result = mysqli_query($query);
        if (!$result){
            exit(mysqli_error());
        }

        $row = array();
        echo '<div class="quick-bg">
			<div id="spacer" style="margin-top:15px;">
				<div id="rc-bg">Menu</div>
			</div>';
        for ($i = 0; $i < mysqli_num_rows($result); $i++){
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            printf("<div class='quick-links'> <a href='?option=category&id_cat=%s'>%s</a></div>", $row['id_category'], $row['name_category']);
        }
    }



    public function get_body(){
        $this->get_header();
        $this->get_left_bar();
    }
}










?>