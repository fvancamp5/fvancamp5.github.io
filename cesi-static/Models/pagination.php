<?php

use PhpMyAdmin\Server\Select;

$bdd = new PDO('mysql:host=localhost;dbname=LeBonPlan', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

$request= $bdd->query('SELECT * FROM entreprise');

while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
    $entreprises[] = $row;
}

/*
$entreprises =[
    ['nom' => 'Techcorp', 'secteur' => 'Technologie', 'ville' => 'Paris'],
    ['nom' => 'Mediacorp', 'secteur' => 'Médias', 'ville' => 'Lyon'],
    ['nom' => 'AgroPlus', 'secteur' => 'Agroalimentaire', 'ville' => 'Toulouse'],
    ['nom' => 'AutoMeca', 'secteur' => 'Automobile', 'ville' => 'Marseille'],
    ['nom' => 'EcoPower', 'secteur' => 'Énergie', 'ville' => 'Bordeaux'],
    ['nom' => 'PharmaLife', 'secteur' => 'Pharmaceutique', 'ville' => 'Lille'],
    ['nom' => 'BuildCon', 'secteur' => 'Construction', 'ville' => 'Nice'],
    ['nom' => 'Foodies', 'secteur' => 'Restauration', 'ville' => 'Nantes'],
    ['nom' => 'FinanceX', 'secteur' => 'Finance', 'ville' => 'Strasbourg'],
    ['nom' => 'DigitalWeb', 'secteur' => 'Technologie', 'ville' => 'Rennes'],
    ['nom' => 'GreenTech', 'secteur' => 'Écologie', 'ville' => 'Grenoble'],
    ['nom' => 'AeroSpace', 'secteur' => 'Aéronautique', 'ville' => 'Toulouse'],
    ['nom' => 'ModeChic', 'secteur' => 'Mode', 'ville' => 'Paris'],
    ['nom' => 'LogiTrans', 'secteur' => 'Logistique', 'ville' => 'Lille'],
    ['nom' => 'BioInnov', 'secteur' => 'Biotechnologie', 'ville' => 'Montpellier'],
    ['nom' => 'EduForm', 'secteur' => 'Éducation', 'ville' => 'Lyon'],
    ['nom' => 'GameSoft', 'secteur' => 'Jeux vidéo', 'ville' => 'Bordeaux'],
    ['nom' => 'ArtDesign', 'secteur' => 'Design', 'ville' => 'Nice'],
    ['nom' => 'ConnectIT', 'secteur' => 'Technologie', 'ville' => 'Paris'],
    ['nom' => 'ElectroShop', 'secteur' => 'Électronique', 'ville' => 'Marseille'],
    ['nom' => 'HealthFirst', 'secteur' => 'Santé', 'ville' => 'Toulouse'],
    ['nom' => 'AutoElite', 'secteur' => 'Automobile', 'ville' => 'Strasbourg'],
    ['nom' => 'SpaceTech', 'secteur' => 'Aérospatiale', 'ville' => 'Toulouse'],
    ['nom' => 'RealEstateX', 'secteur' => 'Immobilier', 'ville' => 'Nantes'],
    ['nom' => 'CyberSecure', 'secteur' => 'Sécurité informatique', 'ville' => 'Rennes'],
    ['nom' => 'AI Solutions', 'secteur' => 'Intelligence artificielle', 'ville' => 'Grenoble'],
    ['nom' => 'AgriFuture', 'secteur' => 'Agriculture', 'ville' => 'Montpellier'],
    ['nom' => 'MediWeb', 'secteur' => 'Santé numérique', 'ville' => 'Lyon'],
    ['nom' => 'CarLux', 'secteur' => 'Automobile', 'ville' => 'Bordeaux'],
    ['nom' => 'SolarTech', 'secteur' => 'Énergie solaire', 'ville' => 'Nice'],
    ['nom' => 'GigaData', 'secteur' => 'Big Data', 'ville' => 'Paris'],
    ['nom' => 'OceanBlue', 'secteur' => 'Environnement', 'ville' => 'Marseille'],
    ['nom' => 'CryptoBank', 'secteur' => 'Finance', 'ville' => 'Strasbourg'],
    ['nom' => 'CloudNet', 'secteur' => 'Cloud computing', 'ville' => 'Rennes'],
    ['nom' => 'EduWorld', 'secteur' => 'Éducation', 'ville' => 'Toulouse'],
    ['nom' => 'DigitalMark', 'secteur' => 'Marketing numérique', 'ville' => 'Lyon'],
    ['nom' => 'E-Shop', 'secteur' => 'E-commerce', 'ville' => 'Paris'],
    ['nom' => 'SmartHome', 'secteur' => 'Domotique', 'ville' => 'Nantes'],
    ['nom' => 'FastTrack', 'secteur' => 'Transport', 'ville' => 'Lille'],
    ['nom' => 'EcoRecycle', 'secteur' => 'Recyclage', 'ville' => 'Grenoble'],
    ['nom' => 'MechaBot', 'secteur' => 'Robotique', 'ville' => 'Montpellier'],
    ['nom' => 'FineArts', 'secteur' => 'Arts', 'ville' => 'Nice'],
    ['nom' => 'MedCare', 'secteur' => 'Santé', 'ville' => 'Toulouse'],
    ['nom' => 'AI Ventures', 'secteur' => 'Intelligence artificielle', 'ville' => 'Bordeaux'],
    ['nom' => 'TechFix', 'secteur' => 'Réparation informatique', 'ville' => 'Strasbourg'],
    ['nom' => 'WebCode', 'secteur' => 'Développement Web', 'ville' => 'Rennes'],
    ['nom' => 'EventNow', 'secteur' => 'Événementiel', 'ville' => 'Lyon'],
    ['nom' => 'EcoWatt', 'secteur' => 'Énergie', 'ville' => 'Paris'],
    ['nom' => 'GourmetFood', 'secteur' => 'Restauration', 'ville' => 'Marseille'],
];
*/

$entreprises = array_pad($entreprises, 50, ['nom' => 'Inconnu', 'secteur' => 'X', 'ville' => 'Nether']);

$itemPerPage = 10;
$TotalElem = count($entreprises);
$NbPages = ceil($TotalElem / $itemPerPage);
$page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $NbPages ? (int)$_GET['page'] : 1;

$start = ($page - 1) * $itemPerPage;

$Page_Slice = array_slice($entreprises, $start, $itemPerPage);
echo "<div class='logoDiv'>";
    echo "<h1>Page $page</h1>";
echo "</div>";

echo "<div class='pagination'>";
    echo "<table>";
    echo '<tr><th>Nom</th><th>Secteur</th><th>Ville</th></tr>';
    foreach ($Page_Slice as $value) {
        echo "<tr>";
        echo '<td>'.htmlspecialchars($value['name']).'</td>';
        echo '<td>'.htmlspecialchars($value['sector']).'</td>';
        echo '<td>'.htmlspecialchars($value['city']).'</td>';
        echo "</tr>";
    }
    echo "</table>";
echo "</div>";

echo "<div class = 'pagination'>";
    if ($page > 1) {
        echo '<a href="?page='.($page - 1).'" class="button">Précédent</a> ';
    }
    if ($page < $NbPages) {
        echo '<a href="?page='.($page + 1).'" class="button">Suivant</a>';
    }
echo "</div>";


//require 'validate.php';
//if (validation($page,$NbPages) == false) {
//    echo "<p> Veuillez renseigner une réponse valide </p>";
//}
