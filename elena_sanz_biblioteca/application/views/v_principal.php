<?php
    $this->load->helper('url');
    $css = base_url().'css/estilo.css';
?>
<html>
    <head>
        <title>PRESTAMOS</title>
 	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href= <?php echo $css ?> />
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
                        echo "<li><a href='".base_url()."index.php/obtenerLibrosGenero/".$gen. "'>".$gen."</a></li>";
                    }
                    echo "</ul>";
                ?>
            </div>
            <div id="main">
                
