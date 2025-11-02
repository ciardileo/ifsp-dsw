<?php
    function getConnection() {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "crud_produtos";
        $conn = new mysqli($server, $user, $password, $database);

        if ($conn -> connect_error) {
            error_log("Connection error:".$conn -> connect_error);
            return false;
        }

        return $conn;
    }
?>