<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <title>Produtos</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="newProduct.php" class="navbar-link">Novo Produto</a>
            <a href="searchProduct.php" class="navbar-link">Pesquisar produtos</a>
        </nav>
        <h1 class="main-h1">Listagem dos Produtos</h1>
    </header>

    <main>
        <?php
            if (isset($_COOKIE["msg"])) {
                echo "<div class='cookie-warning'>".$_COOKIE["msg"]."</div>";
            }
        ?>

        <table class="products-table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Preço</td>
                    <td></td>
                    <td></td>
                </tr>
            </thead>

            <tbody>
                <?php
                    include_once("../db/produtoDAO.php");
                    $allProducts = getAllProducts();

                    if ($allProducts) {
                        foreach ($allProducts as $product) {
                            echo "<tr>";
                            echo "<td>".$product[0]."</td>";
                            echo "<td>".$product[1]."</td>";
                            echo "<td>".$product[2]."</td>";
                            echo "<td><a class='edit-btn' href='editProduct.php?id=$product[0]'>Editar</a></td>";
                            echo "<td><a class='exclude-btn' href='excludeProduct.php?id=$product[0]'>Excluir</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<p>Não há nenhum produto na base de dados.</p>";
                    }
                ?>  
            </tbody>
        </table>
    </main>
</body>
</html>