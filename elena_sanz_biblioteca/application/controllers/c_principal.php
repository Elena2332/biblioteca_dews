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
        //calendario
        $this->load->library('calendar');
        $dias = [];
        for($i=1 ; $i<=31 ;$i++)
            array_push($dias,'index.php/mostrarDia/'.date('Y').'-'.date('m').'-'.$i);
        $data['calendario'] = $this->calendar->generate(date('Y'), date('m'), $dias);

        //librosPrestamos
        $data['libros'] = $this->m_principal->obtenerLibros();

        //generos
        $data['generos'] = $this->m_principal->obtenerGeneros();  // array de strings generos
        $this->load->view('v_principal',$data);
        $this->load->view('v_calendario',$data);
        $this->load->view('v_librosPrestados',$data);
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

    function mostrarDia($fecha)
    {
        $data['prestamos'] = $this->m_principal->obtenerPrestamosDia($fecha);
        $data['generos'] = $this->m_principal->obtenerGeneros();
        $this->load->view('v_principal',$data);
        $this->load->view('v_prestamosDia',$data);        
        $this->load->view('v_footer'); 
    }

}