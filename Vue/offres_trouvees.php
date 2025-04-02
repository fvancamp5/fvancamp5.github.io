<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pagination des entreprises</title>
        <link rel="stylesheet" href="assets/page.css">
    </head>
    <body class="body_Page_de_recherche">

    <form method="post" >
        <div class="pagination">
            <label for="nbrOffer">Nombre d'offres</label>
            <select id="nbrOffer" name="nbrOffer">
                <option value="">Changer le nombre d'offre</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
            <button type="submit" value="submit" class="button">Appliquer</button>
        </div>
  
  </form>

  <?php
    include("../PDO/afficheOffre.php");
  ?>

<script src="java.js"></script>
</body>
</html>




 