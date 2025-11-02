<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <title>Excluir Produto</title>
</head>

<body>
    <main>
        <?php
            if (isset($_GET["id"])) {
                if (isset($_COOKIE["msg"])) {
                    echo "<div class='cookie-warning'>" . $_COOKIE["msg"] . "</div>";
                }

                $id = $_GET["id"];
                echo "<h1 class='main-h1'>Exclusão do produto $id</h1>";
                $html = "<form action='../backend/exclude.php' method='POST'>
                        <h2>Você tem certeza que deseja excluir esse produto?</h2>
                        <p>Essa ação é irreversível!</p>
                        <a href='productList.php'>Voltar aos produtos</a>
                        <input type='hidden' value='$id' name='id'>
                        <input type='submit' value='Confirmar exclusão'>
                    </form>";
                echo $html;
            } else {
                header("Location: productList.php");
            }
        ?>
    </main>
</body>

</html>