<form action="" method="POST">
    <select>
        <?php
            foreach($libros as $libro)
                echo '<option value="'.$libro->titulo.'">'.$libro->titulo.'</option>';
        ?>
    </select>
    <input type="submit" name="btnPrestar" value="PRESTAR LIBROS"/>
</form>