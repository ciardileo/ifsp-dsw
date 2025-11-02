<?php
    if (isset($_POST["id"])) {
        include_once("../db/produtoDAO.php");
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];

        if (editProduct($id, $name, $price)) {
            setcookie("msg", "Produto $id modificado com sucesso!", time() + 5, "/");
            header("Location: ../pages/productList.php");
            exit();
        } else {
            setcookie("msg", "Houve um erro ao modificar o produto $id!", time() + 5, "/");
            header("Location: ../pages/editProduct.php?id=$id");
            exit();
        }

    } else {
        echo "Unauthorized.";
        header("Location: ../productList.php");
    }

?>