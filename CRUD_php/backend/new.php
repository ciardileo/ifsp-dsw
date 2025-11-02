<?php
    if (isset($_POST["name"])) {
        include_once("../db/produtoDAO.php");
        $name = $_POST["name"];
        $price = $_POST["price"];

        if (addProduct($name, $price)) {
            setcookie("msg", "Produto $name adicionado com sucesso!", time() + 5, "/");
            header("Location: ../pages/productList.php");
        } else {
            setcookie("msg", "Algo deu errado na hora de adicionar!", time() + 5, "/");
            header("Location: ../pages/newProduct.php");
        }


    } else {
        header("Location: ../pages/productList.php");
    }

?>