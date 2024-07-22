<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $femaleFile = $_FILES['femaleFile']['tmp_name'];
    $maleFile = $_FILES['maleFile']['tmp_name'];

    $femaleOscars = array_map('str_getcsv', file($femaleFile));
    $maleOscars = array_map('str_getcsv', file($maleFile));

    $femaleHeader = array_shift($femaleOscars);
    $maleHeader = array_shift($maleOscars);

    $oscarsByYear = [];
    $moviesWithBothAwards = [];

    foreach ($femaleOscars as $row) {
        $year = $row[1] ?? null;
        $actress = $row[3] ?? null;
        $age = $row[2] ?? null;
        $movie = $row[4] ?? null;

        if ($year && $actress && $age && $movie) {
            if (!isset($oscarsByYear[$year])) {
                $oscarsByYear[$year] = ['female' => '', 'male' => ''];
            }
            $oscarsByYear[$year]['female'] = "$actress ($age)<br><i>$movie</i>";

            $moviesWithBothAwards[$movie]['female'] = $actress;
            $moviesWithBothAwards[$movie]['year'] = $year;
        }
    }

    foreach ($maleOscars as $row) {
        $year = $row[1] ?? null;
        $actor = $row[3] ?? null;
        $age = $row[2] ?? null;
        $movie = $row[4] ?? null;

        if ($year && $actor && $age && $movie) {
            if (!isset($oscarsByYear[$year])) {
                $oscarsByYear[$year] = ['female' => '', 'male' => ''];
            }
            $oscarsByYear[$year]['male'] = "$actor ($age)<br><i>$movie</i>";

            $moviesWithBothAwards[$movie]['male'] = $actor;
            $moviesWithBothAwards[$movie]['year'] = $year;
        }
    }

    $moviesWithBothAwards = array_filter($moviesWithBothAwards, function($movie) {
        return isset($movie['female']) && isset($movie['male']);
    });

    ksort($oscarsByYear);
    ksort($moviesWithBothAwards);
}
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled Oscarů</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Přehled Oscarů</h1>

    <h2 class="mb-4">Přehled Oscarů podle roku</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Rok</th>
            <th>Žena</th>
            <th>Muž</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($oscarsByYear as $year => $winners): ?>
            <tr>
                <td><?= $year ?></td>
                <td><?= $winners['female'] ?></td>
                <td><?= $winners['male'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="mt-5 mb-4">Filmy s Oscary za nejlepší hlavní ženskou i mužskou roli</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Název filmu</th>
            <th>Rok</th>
            <th>Herečka</th>
            <th>Herec</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($moviesWithBothAwards as $movie => $details): ?>
            <tr>
                <td><?= $movie ?></td>
                <td><?= $details['year'] ?></td>
                <td><?= $details['female'] ?></td>
                <td><?= $details['male'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
