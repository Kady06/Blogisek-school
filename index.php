<?php

declare(strict_types=1);

// Spuštění session
session_start();

include_once "config.php";
include_once FUNC . "template.php";

$URL = isset($_GET["url"]) ? explode('/', $_GET["url"]) : [DEFAULT_CONTROLLER, DEFAULT_METHOD, 0];



$controllerName = ucfirst($URL[0]);
$method = $URL[1] ?? DEFAULT_METHOD;
$methodData = $URL[2] ?? null;

// Kontrola existence souboru kontroléru
$controllerFile = "controllers/" . $controllerName . ".php";
if (!file_exists($controllerFile)) {
    $controllerFile = "controllers/_404.php";
    $controllerName = "_404";
}

// Načtení souboru kontroléru
require_once $controllerFile;

// Vytvoření instance kontroléru
$controller = new $controllerName();

// Zavolání metody, pokud existuje
if (method_exists($controller, $method)) {
    try {
        $controller->$method($methodData);
    } catch (Exception $e) {
        // Zpracování výjimky při volání metody
        echo "Chyba při zpracování požadavku: " . $e->getMessage();
    }
} else {
    // Metoda neexistuje
    echo "Požadovaná metoda neexistuje!";
}
