<?php  
    if(count($prestamos) > 0)
    {        
        //  TABLA LIBROS PRESTADOS
        $txtHTML = '<table><tr> <th>LIBRO</th> <th>AUTOR</th></tr>';
        foreach($prestamos as $pres)
        {
            $txtHTML = $txtHTML. '<tr>';
            $txtHTML = $txtHTML. '<td>'.$pres->titulo.'</td>';
            $txtHTML = $txtHTML. '<td>'.$pres->nombre.'</td>';
        }
        $txtHTML = $txtHTML. '</tr></table>';
        echo $txtHTML;
    }
    else
        echo '<h2>No se han prestado libros este dia  :)</h2>';
?>