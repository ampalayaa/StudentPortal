<?php

    function connection(){

        $host = 'localhost';
        $user = 'root';
        $password = ''; 
        $dbname = 'student_portal'; 
        $port = 3307;

        // Establish Database Connection
        $con = new mysqli($host, $user, $password, $dbname, $port);

        if ($con->connect_error) {
            echo $con->connect_error;
        }else{

            return $con;
        }

        

    }