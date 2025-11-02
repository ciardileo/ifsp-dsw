<?php
    include_once("connection.php");

    // retorna todos os produtos em um array
    function getAllProducts() {
        // conexão
        $conn = getConnection();
        $sql = "SELECT * FROM produto;";

        if (!$conn) {
            return false;
        }
        
        // results
        $resultsArray = array();

        // query
        $results = $conn -> query($sql);

        if ($results -> num_rows > 0) {
            $count = 0;
            while ($row = $results -> fetch_assoc()) {
                $resultsArray[$count][0] = $row["id"];
                $resultsArray[$count][1] = $row["name"];
                $resultsArray[$count][2] = $row["price"]; 
                $count += 1;
            }
            
            // closing and returning
            $conn -> close();
            return $resultsArray;
        } else {
            $conn -> close();
            return false;
        }
    } 

    // retorna apenas um produto
    function getProduct($id) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        $sql = "SELECT * FROM produto where id = ?;";
        
        // results
        $resultsArray = array();

        // query
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $id);

        if ($stmt -> execute()){
            $results = $stmt -> get_result();

            if ($results -> num_rows > 0) {
                $row = $results -> fetch_assoc();
                $resultsArray[0] = $row["id"];
                $resultsArray[1] = $row["name"];
                $resultsArray[2] = $row["price"]; 
                return $resultsArray;

            } else {
                $stmt -> close();
                $conn -> close();
                return false;
            }
        } else {
            $stmt -> close();
            $conn -> close();
            return false;
        }
    }

    // edita um produto 
    function editProduct($id, $name, $price) {
        // pega a conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // prepared statement
        $sql = "UPDATE produto SET name = ?, price = ? WHERE id = ?;";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("sdi", $name, $price, $id);

        // execute 
        if ($stmt -> execute()) {
            $stmt -> close();
            $conn -> close();
            return true;
        } else {
            $stmt -> close();
            $conn -> close();
            return false;
        }
    }

    // adiciona produto
    function addProduct($name, $price) {
        // pega a conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // prepared statement
        $sql = "INSERT INTO produto (name, price) VALUES (?, ?)";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("sd", $name, $price);

        // execute 
        if ($stmt -> execute()) {
            $stmt -> close();
            $conn -> close();
            return true;
        } else {
            $stmt -> close();
            $conn -> close();
            return false;
        }
    }

    // remove produto
    function removeProduct($id) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        // statement
        $sql = "DELETE FROM produto WHERE id = ?";
        $stmt = $conn -> prepare($sql);
        $stmt -> bind_param("i", $id);

        // execução
        if ($stmt -> execute()) {
            $stmt -> close();
            $conn -> close();
            return true;
        } else {
            $stmt -> close();
            $conn -> close();
            return false;
        }

    }

    // filtra produtos
    function searchProduct($query) {
        // conexão
        $conn = getConnection();

        if (!$conn) {
            return false;
        }

        $sql = "SELECT * FROM produto WHERE id = ? OR name LIKE ?;";
        
        // results
        $resultsArray = array();

        // query
        $stmt = $conn -> prepare($sql);
        $likeQuery = "$query%";
        $stmt -> bind_param("ss", $query, $likeQuery);

        if ($stmt -> execute()){
            $results = $stmt -> get_result();

            if ($results -> num_rows > 0) {
                $count = 0;
                while ($row = $results -> fetch_assoc()) {
                    $resultsArray[$count][0] = $row["id"];
                    $resultsArray[$count][1] = $row["name"];
                    $resultsArray[$count][2] = $row["price"]; 
                    $count += 1;
                }

                $stmt -> close();
                $conn -> close();
                return $resultsArray;

            } else {
                $stmt -> close();
                $conn -> close();
                return false;
            }
        } else {
            $stmt -> close();
            $conn -> close();
            return false;
        }
    }
?>