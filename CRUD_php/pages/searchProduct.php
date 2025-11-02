<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Pesquisa</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="newProduct.php" class="navbar-link">Novo Produto</a>
            <a href="productList.php" class="navbar-link">Listar Produtos</a>
        </nav>
    </header>

    <main>
        <?php
            if (isset($_COOKIE["msg"])) {
                echo "<div class='cookie-warning'>".$_COOKIE["msg"]."</div>";
            }
        ?>

        <section id="search">
            <form action="searchProduct.php" method="GET">
                <input type="text" name="query" id="query" placeholder="Pesquise pelo nome ou id...">
                <button type="submit" class="search-btn ripple" aria-label="Pesquisar"><i class="fa fa-search"></i></button>
            </form>
        </section>

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
                    if (isset($_GET["query"])) {
                        include_once("../db/produtoDAO.php");
                        $query = $_GET["query"];

                        $filteredProducts = searchProduct($query);

                        if ($filteredProducts) {
                            $count = count($filteredProducts);
                            echo "<p>$count produtos encontrados!</p>";
                            foreach ($filteredProducts as $product) {
                                echo "<tr>";
                                echo "<td>".$product[0]."</td>";
                                echo "<td>".$product[1]."</td>";
                                echo "<td>".$product[2]."</td>";
                                echo "<td><a class='edit-btn' href='editProduct.php?id=$product[0]'>Editar</a></td>";
                                echo "<td><a class='exclude-btn' href='excludeProduct.php?id=$product[0]'>Excluir</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<p>0 produtos encontrados.</p>";
                        }
                    }
                ?>  
            </tbody>
        </table>
    </main>
</body>
</html>