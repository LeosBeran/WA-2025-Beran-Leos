<?php
require_once '../models/Database.php';
require_once '../models/Player.php';

class PlayerController {
    private $db;
    private $playerModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->playerModel = new Player($this->db);
    }

    public function createPlayer() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $lastname = htmlspecialchars($_POST['lastname']);
            $club = htmlspecialchars($_POST['club']);
            $position = htmlspecialchars($_POST['position']);
            $born = intval($_POST['born']);
            $price = floatval($_POST['price']);
            $nationality = htmlspecialchars($_POST['nationality']);


            // Zpracování nahraných obrázků
            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename; // Relativní cesta
                    }
                }
            }


            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->playerModel->create($lastname, $club, $position, $born, $price, $nationality, $imagePaths)) {
                header("Location: ../controllers/players_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listPlayers() {
        $players = $this->playerModel->getAll();
        include '../views/players/players_list.php';
    }
}

// Volání metody při odeslání formuláře
$controller = new PlayerController();
$controller->createPlayer();