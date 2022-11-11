<form action="" method="POST">
    <table>
        <?php
            //  TABLA LIBROS
            $txtHTML = '<tr><th></th> <th>LIBRO</th> <th>AUTOR</th></tr>';
            foreach($libros as $libro)
            {
                $txtHTML = $txtHTML. '<tr>';
                $txtHTML = $txtHTML. '<td><input type="checkbox" name="chLibros[]" value="'.$libro->idlibro.'"/></td>';
                $txtHTML = $txtHTML. '<td>'.$libro->titulo.'</td>';
                $txtHTML = $txtHTML. '<td>'.$libro->nombre.'</td>';
                $txtHTML = $txtHTML. '</tr>';
            }
            $txtHTML = $txtHTML. '<tr><td colspan=3><input type="submit" name="btnPrestar" value="PRESTAR LIBROS"/></td></tr>';
            echo $txtHTML;
        ?>
    </table>
</form>