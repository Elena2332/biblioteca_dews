<!-- LISTAS PRESTAMOS -->
<?php
    if(isset($_POST['chLibros']))  // ha mandado el formulario
    {
        $arrLibros = $_POST['chLibros'];
        if(count($arrLibros) > 0)  // hay checks seleccionados
        {
            echo '<h2>LIBROS PRESTADOS</h2>';
            foreach($librosPrestados as $prestado)
                echo '<li>'.$prestado->titulo.'</li>';

            echo '<h2>LIBROS NO PRESTADOS</h2>';
            foreach($librosNoPrestados as $noPrestado)
                echo '<li>'.$noPrestado->titulo.'</li>';
        }
    }
?>