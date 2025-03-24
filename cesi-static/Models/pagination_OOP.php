<?php

class Entreprise {
    public $bdd;
    public $itemPerPage = 10;
    public $TotalElem;
    public $NbPages ;
    public $page ;
    public $start ;
    public $entreprises ;
    public $Page_Slice ;

    public function populateDB(string $host, string $dbname = 'LeBonPlan', string $username = 'root', string $password = '') {
        $this->bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $request= $this->bdd->query('SELECT * FROM entreprise');

        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $this->entreprises[] = $row;
        }
        $this->TotalElem = count($this->entreprises);
        $this->NbPages = ceil($this->TotalElem / $this->itemPerPage);
        $this->page = isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $this->NbPages ? (int)$_GET['page'] : 1;
        $this->start = ($this->page - 1) * $this->itemPerPage;
    }

    public function printEntreprise():void {
        $this->Page_Slice = array_slice($this->entreprises, $this->start, $this->itemPerPage);
        echo "<div class='logoDiv'>";
            echo "<h1>Page $this->page</h1>";
        echo "</div>";

        echo "<div class='pagination'>";
            echo "<table>";
            echo '<tr><th>Nom</th><th>Secteur</th><th>Ville</th></tr>';
            foreach ($this->Page_Slice as $value) {
                echo "<tr>";
                echo '<td>'.htmlspecialchars($value['name']).'</td>';
                echo '<td>'.htmlspecialchars($value['sector']).'</td>';
                echo '<td>'.htmlspecialchars($value['city']).'</td>';
                echo "</tr>";
            }
            echo "</table>";
        echo "</div>";

        echo "<div class = 'pagination'>";
            if ($this->page > 1) {
                echo '<a href="?page='.($this->page - 1).'" class="button">Précédent</a> ';
            }
            if ($this->page < $this->NbPages) {
                echo '<a href="?page='.($this->page + 1).'" class="button">Suivant</a>';
            }
        echo "</div>";
        }
}

?>