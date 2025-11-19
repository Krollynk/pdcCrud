<?php
    $data = $resultado;
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/main.css">
        <title>PDC CRUD</title>
    </head>
    <body>
        <?php include "navbar.php" ?>
        <main>
            <?php
                if(isset($viewFile)){
                    include $viewFile;
                } else {
                    echo "<h2>Error: no se cargó ninguna vista.</h2>";
                }
            ?>
        </main>
    </body>
</html>