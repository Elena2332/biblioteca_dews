<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_principal extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_principal');
    }

    function index()
    {
        $data['generos'] = $this->m_principal->obtenerGeneros();  // array de strings generos
        $this->load->view('v_principal',$data);
        $this->load->view('v_footer');
    }


    function obtenerGeneros()
    {
        $data['generos'] = $this->m_principal->obtenerGeneros();  // array de strings generos
        $this->load->view('v_principal',$data);
    }


    function obtenerLibrosGenero($gen)
    {
        $this->obtenerGeneros();
        $data['libros'] = $this->m_principal->obtenerLibrosGenero($gen);  // array de libros autor

        // $this->load->view('v_principal');
        $this->load->view('v_tablaLibros',$data);   // carga tabla de libros y autores
        $this->load->view('v_listaLibros',$data);   // carga vista de las listas
        $this->load->view('v_footer');
    }



}