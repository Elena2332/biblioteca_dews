<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_principal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtenerGeneros()   // return array de generos
    {
        $res = $this->db->query("select distinct(genero) from libros");
        return $res->result();
    }

    function obtenerLibrosGenero($gen)  // return array de libros del genero $gen
    {
        $sql = "select idlibro, titulo, nombre from libros,autores where libros.idautor=autores.idautor and genero='$gen'";
        $res = $this->db->query($sql);
        return $res->result();
    }

    function obtenerLibro($id)  // return titulo del libro que tiene el id $id
    {
        $sql = "select titulo from libros where idlibro='$id'";
        $res = $this->db->query($sql);
        return $res->result()[0];
    }

    function obtenerPrestamosPorLibro($id)  // return numero de prestamos que tiene un libro
    {
        $sql = "select idprestamo from prestamos where idlibro='$id'";
        $res = $this->db->query($sql);
        $numFilas = $res->num_rows();
        return $numFilas;
    }


    function insertarPrestamo($id)  // inserta un prestamo
    {
        $fecha = date('Y-m-d');
        $sql = "insert into prestamos (idlibro, fecha) values ('$id','$fecha')";  
        $this->db->query($sql);
    }
}
