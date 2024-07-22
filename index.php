<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled Oscarů</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Přehled Oscarů</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-5">
        <div class="mb-3">
            <label for="femaleFile" class="form-label">Nahrát CSV soubor - Oscary pro ženy</label>
            <input class="form-control" type="file" id="femaleFile" name="femaleFile" required>
        </div>
        <div class="mb-3">
            <label for="maleFile" class="form-label">Nahrát CSV soubor - Oscary pro muže</label>
            <input class="form-control" type="file" id="maleFile" name="maleFile" required>
        </div>
        <button type="submit" class="btn btn-primary">Nahrát</button>
    </form>
</div>
</body>
</html>
