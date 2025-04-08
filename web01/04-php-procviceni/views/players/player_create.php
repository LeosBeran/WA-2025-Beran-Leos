<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat hráče</title>
    
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
                            <a class="nav-link" href="../../controllers/players_list.php">Výpis hráčů</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat nového hráče</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/PlayerController.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="title" class="form-label">Přijmení hráče: <span class="text-danger">*</span></label>
                                <input type="text" id="lastname" name="lastname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label">Klub: <span class="text-danger">*</span></label>
                                <input type="text" id="club" name="club" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Pozice:</label>
                                <input type="text" id="position" name="position" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="subcategory" class="form-label">Rok narození:</label>
                                <input type="number" id="born" name="born" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Cena: <span class="text-danger">*</span></label>
                                <input type="number" id="price" name="price" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Národnost: <span class="text-danger">*</span></label>
                                <input type="text" id="nationality" name="nationality" class="form-control" step="0.01" required>
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Obrázky (můžete nahrát více):</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit hráče</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>