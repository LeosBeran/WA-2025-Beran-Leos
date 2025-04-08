<?php

class Player {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($lastname, $club, $position, $born, $price, $nationality, $images) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO players (lastname, club, position, born, price, nationality,images) 
                VALUES (:lastname, :club, :position, :born, :price, :nationality, :images)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':lastname' => $lastname,
            ':club' => $club,
            ':position' => $position,
            ':born' => $born,
            ':price' => $price,
            ':nationality' => $nationality,
            ':images' => json_encode($images) // Ukládání obrázků jako JSON
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM players ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }}