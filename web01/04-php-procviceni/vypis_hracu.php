<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam hráčů</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/players/player_create.php">Přidat hráče</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="../../controllers/players_list.php">Výpis hráčů</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Seznam hráčů</h2>
            </div>
            <div class="card-body">
                <?php if (!empty($players)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Příjmení</th>
                                    <th>Klub</th>
                                    <th>Pozice</th>
                                    <th>Rok narození</th>
                                    <th>Cena</th>
                                    <th>Národnost</th>
                                    <th>Obrázky</th>
                                    <th>Datum vytvoření</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($players as $player): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($player['id']); ?></td>
                                        <td><?php echo htmlspecialchars($player['lastname']); ?></td>
                                        <td><?php echo htmlspecialchars($player['club']); ?></td>
                                        <td><?php echo htmlspecialchars($player['position']); ?></td>
                                        <td><?php echo htmlspecialchars($player['born']); ?></td>
                                        <td><?php echo htmlspecialchars($player['price']); ?> Kč</td>
                                        <td><?php echo htmlspecialchars($player['nationality']); ?></td>
                                        <td>
                                            <?php 
                                            if (!empty($player['images'])) {
                                                $images = json_decode($player['images'], true);
                                                foreach ($images as $image) {
                                                    echo '<img src="' . htmlspecialchars($image) . '" class="img-thumbnail" style="max-height: 50px; margin-right: 5px;">';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($player['created_at']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-info">Žádní hráči nebyli nalezeni.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>