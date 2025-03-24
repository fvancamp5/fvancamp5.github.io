<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Success</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<header id="logoHeader">
    <div class="logoDiv">
        <img src="assets/logo.png" alt="logo">
    </div>
    <nav class="navbar">
        <ul>
        <li><a href="../index.html" id="navSelectedText">Accueil</a></li>
            <li><a href="#">A propos</a></li>
            <li><a href="#">Inscription</a></li>
            <li><a href="#">Connexion</a></li>
            <li><a href="#">Avis</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="search.php">Entreprises</a></li>
        </ul>
    </nav>
</header>

    <main>
        <div class = "logoDiv">
            <h1> Liste des entreprises </h1>
        </div>

        <?php include '../Models/pagination_OOP.php';
            $entreprise = new Entreprise();
            $entreprise->populateDB('localhost', 'LeBonPlan', 'root', '');
            $entreprise->printEntreprise();
        ?>

    </main>
</body>
</html>
