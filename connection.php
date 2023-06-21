<?php

    $database= new mysqli("localhost","root","","edoc");
    if ($database->connect_error){
        die("Bağlantı başarısız!:  ".$database->connect_error);
    }

?>