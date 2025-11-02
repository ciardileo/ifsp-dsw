<?php
    if (isset($_POST["id"])) {
        include_once("../db/produtoDAO.php");
        $id = $_POST["id"];

        if (removeProduct($id)) {
            setcookie("msg", "Produto $id removido com sucesso!", time() + 5, "/");
            header("Location: ../pages/productList.php");
        } else {
            setcookie("msg", "Houve um erro na hora da exclusão!", time() + 5, "/");
            header("Location: ../pages/excludeProduct.php?id=$id");
        }

    } else {
        echo "Unauthorized";
        header("Location: ../pages/productList.php");
    }
?>