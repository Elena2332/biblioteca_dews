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
        // libros para la tabla
        $this->obtenerGeneros();
        $data['libros'] = $this->m_principal->obtenerLibrosGenero($gen);  // array de libros autor
        $this->load->view('v_tablaLibros',$data);   // carga tabla de libros y autores

        //libros para las listas
        $seleccionados = $this->input->post('chLibros');
        $data['librosPrestados'] = [];
        $data['librosNoPrestados'] = [];
        if(count($seleccionados) > 0)
        {
            foreach($seleccionados as $sele)
            {           
                $libro = $this->m_principal->obtenerLibro($sele);
                $numPrestamos = $this->m_principal->obtenerPrestamosPorLibro($sele);  
                if($numPrestamos < 4)  // si se ha prestado menos de 4 veces se puede prestar
                {
                    array_push($data['librosPrestados'], $libro); 
                    $this->m_principal->insertarPrestamo($sele);   // insertar prestamo
                }
                else
                    array_push($data['librosNoPrestados'], $libro);
            }
            $this->load->view('v_listasLibros',$data);   // carga vista de las listas
        }        

        $this->load->view('v_footer');   //cargar footer
    }
}