<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/globals.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <title>Novo Produto</title>
</head>
<body>
    <header>
       <nav class="navbar">
            <a href="productList.php" class="navbar-link">Lista de Produtos</a>
            <a href="searchProduct.php" class="navbar-link">Pesquisar produtos</a>
        </nav>
        <h1 class="main-h1">Novo Produto</h1>
    </header>

    <main>
        <?php
        if (isset($_COOKIE["msg"])) {
            echo "<div class='cookie-warning'>".$_COOKIE["msg"]."</div>";
        }
        ?>

        <form action="../backend/new.php" method="POST">
        <div>
            <label for="name">Nome:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="price">Preço:</label>
            <input type="number" name="price" id="price" step=0.1 required>
        </div>

        <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>