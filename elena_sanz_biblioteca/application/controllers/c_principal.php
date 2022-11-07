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
        $this->obtenerGeneros();
        $this->load->view('v_pie');
    }


    function obtenerGeneros()
    {
        $data['generos'] = $this->m_principal->obtenerGeneros();  // array de strings generos
        $this->load->view('v_principal',$data);
    }

}