<?php
include("Pilote.php");


    $db = new Pilote('mysql:host=localhost;dbname=web4all', 'website_user', 'kxHBI-ozJOjvwr_H');    
    $promos = json_decode($db->getAllPromotions());

    if (is_array($promos)) {
        foreach ($promos as $promo) {
            echo '<div class="promo-item">';
            echo '<button class="toggle-btn">';
            echo htmlspecialchars($promo->{"Nom-promo"});
            echo '<span>➕</span></button>';
            echo '<ul class="eleve-list">';

            $students = json_decode($db->getStudentByPromo($promo->{"ID-promo"}));

            if (is_array($students) && !empty($students)) {
                foreach ($students as $student) {
                    echo '<li>' . htmlspecialchars($student->{"Prenom-etudiant"}) . ' | ' . htmlspecialchars($student->{"Nom-etudiant"}) . '</li>';
                }
            } else {
                echo '<li>Aucun étudiant trouvé pour cette promotion.</li>';
            }

            echo '</ul>';
            echo '</div>';
        }
    } else {
        echo '<p>Erreur : Impossible de récupérer les promotions.</p>';
    }
?>