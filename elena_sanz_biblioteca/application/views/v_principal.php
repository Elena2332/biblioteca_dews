<html>
    <head>
        <title>PRESTAMOS</title>
 	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="./css/estilo.css">
    </head>
    <body>
        <div id="header">
            <h1>PRESTAMOS</h1>
        </div>
        <div id="container">
            <div id="bar">
                <?php
                    // FILTRO GENERO
                    foreach($generos as $gen) 
                    {
                        $gen = $gen->genero;
                        echo "<li><a href='index.php/obtenerGeneros/".$gen. "'>".$gen."</a></li>";
                    }
                    echo "</ul>";
                ?>
            </div>
            <div id="main">
                

