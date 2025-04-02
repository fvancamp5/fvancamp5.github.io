<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web4ALL espace pilote</title>
    <link rel="stylesheet" href="assets/style-web.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="body">
<header>
    <nav class="navbar">
        <div class="logo">
            <img src="assets/logo.png" alt="Web4ALL Logo">
        </div>

        <div class="services-dropdown">
            <button class="hamburger-menu">
                <span class="hamburger-icon"></span>
                Services
            </button>
            <div class="dropdown-content">
                <a href="accueil.html"><i class="fas fa-home"></i> Accueil</a>
                <a href="a-propos.html"><i class="fas fa-info-circle"></i> À propos de nous</a>
                <a href="avis.html"><i class="fas fa-star"></i> Avis</a>
                <a href="recherche.html"><i class="fas fa-search"></i> Recherche</a>
                <a href="espace-tuteur.html"><i class="fas fa-chalkboard-teacher"></i> Espace Tuteur</a>
                <a href="mon-compte-etudiant.html"><i class="fas fa-user-graduate"></i> Mon compte Étudiant</a>
                <a href="mon-compte-tuteur.html"><i class="fas fa-user-tie"></i> Mon compte Tuteur</a>
            </div>
        </div>
        <h1> P.A.I.J </h1>
        <div class="right-menu">
            <a href="connexion.html" class="nav-button active"><i class="fas fa-sign-in-alt"></i> Connexion</a>
            <a href="espace-recruteur.html" class="nav-button"><i class="fas fa-briefcase"></i> Espace recruteur</a>
        </div>
    </nav>
</header>

<div class="containerpilote">
    <div class="sidebar">
        <div class="tuteur">
            <img src="assetd/profil.png" alt="Tuteur">
            <h2 class="titre-connexion-purple">Pilote</h2>
        </div>

        <div class="promo">
        <?php include ("../PDO/afficheEtudiant.php"); ?>
        </div>
    </div>
    <script src="../controler/espace_pilote.js"></script>
    <div class="wrapper">
        <h2 class="titre-connexion-purple">Statistiques des Stages</h2>

        <canvas id="stageChart"></canvas>

        <button id="filterBtn">Ajouter un filtre</button>

        <div class="filters" id="filterContainer">
            <button class="filter" data-filter="all">Tous les stagiaires</button>
            <button class="filter" data-filter="btp">BTP</button>
            <button class="filter" data-filter="informatique">Informatique</button>
            <button class="filter" data-filter="generaliste">Généraliste</button>
        </div>
    
        <?php include("../controler/espace_pilote_pourc.php"); ?>
    </div>
</div>
<footer>
    <div class="footer-content">
        <p>© 2025 P.A.I.J - Tous droits réservés</p>
        <div class="footer-links">
            <a href="mentions.html">Politique relative aux cookies</a>
            <a href="mentions.html">Politique de confidentialité</a>
            <a href="mentions.html">Conditions d'utilisation</a>
        </div>
    </div>
</footer>
</body>
</html>