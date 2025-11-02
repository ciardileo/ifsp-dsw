<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <title>Editar Produto</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="productList.php" class="navbar-link">Lista de Produtos</a>
            <a href="newProduct.php" class="navbar-link">Novo Produto</a>
            <a href="searchProduct.php" class="navbar-link">Pesquisar produtos</a>
        </nav>
    </header>

    <main>
        <?php
            include("../db/produtoDAO.php");

            if (isset($_GET["id"])) {
                $product = getProduct($_GET["id"]);

                if ($product) {
                    if (isset($_COOKIE["msg"])) {
                        echo "<div class='cookie-warning'>".$_COOKIE["msg"]."</div>";
                    }

                    echo "<h1 class='main-h1'>Edição do produto $product[1]</h1>";
                    $block = "<form action='../backend/edit.php' method='POST'>     
                        <input type='hidden' name='id' value=$product[0]>

                        <div>
                            <label for='name'>Nome</label>
                            <input type='text' name='name' value=$product[1]>
                        </div>

                        <div>
                            <label for='price'>Preço</label>
                            <input type='number' name='price' step='0.1' value=$product[2]>
                        </div>

                        <input type='submit' value='Enviar'>
                    </form>";
                    echo $block;
                } else {
                    echo "<h1>Erro ao carregar produto!</h1>";
                }

                
            } else {
                echo "<h1>Nenhum ID foi identificado no cabeçalho!</h1>";
            }
        ?>
    </main>
</body>
</html>