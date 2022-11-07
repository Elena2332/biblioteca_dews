<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_principal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function obtenerGeneros()
    {
        $res = $this->db->query("select distinct(genero) from libros");
        return $res->result();
    }




    
}
