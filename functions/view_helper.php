<?php
function renderLayout($view, $resultado = null)
{
    $viewFile = __DIR__ . '/../views/' . $view . '.php';
    if (file_exists($viewFile)) {
        include __DIR__ . '/../views/layout.php';
    } else {
        echo "<h2>La vista '$view' no existe.</h2>";
    }
}