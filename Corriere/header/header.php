<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="../style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap JS -->

</head>
<body class = "d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-secondary-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="../homepage/homepage.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Accedi/accedi.php">Accedere</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Inserimento_cliente/inserimento_cliente.php">Inserimento cliente</a>
                </li>
            </ul>

            <!-- Dropdown Inserimento Plico -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inserimento plico
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../Inserimento_plico/inserimento_plico.php">Inserimento plico</a></li>
                        <li><a class="dropdown-item" href="../Inserimento_plico/inserimento_spedizione.php">Inserimento spedizione</a></li>
                        <li><a class="dropdown-item" href="../Inserimento_plico/inserimento_ritiro.php">Inserimento ritiro</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Visualizza_singolo/singolo.php">Visualizzazione plico</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Visualizza_plichi/visualizza_plichi.php">Gestione delle spedizioni</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../Plichi_consegnati/consegnati.php">Visualizzazione di plichi consegnati</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class = "flex-grow-1">
    <br>
    <h1 class="title">Fast Route</h1>


