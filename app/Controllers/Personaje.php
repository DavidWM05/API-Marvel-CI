<?php
namespace App\Controllers;

use App\Models\PersonajeModel;

class Personaje extends BaseController
{
    protected $helpers = ['form'];

    public function enlistados(): string
    {   
        $personajesBD = $this->conectarBD();

        /**  
         * Se verifica si existe una session para busqueda de personaje
         * Si no se encuentra entonces busca a todos los personajes enlistados
        */
        if($this->session->get('encontrado') !== null){
            $personajes = $this->session->get('encontrado');
            $this->session->remove('encontrado');
            
            $datos = array('personajes' => $personajes);
        }else{
            $personajes = $personajesBD->paginate(3);
            $paginator = $personajesBD->pager;
            $paginator->setPath('enlistados/');

            $datos = array('personajes' => $personajes,'paginador'=>$paginator);
        }
        
        //  Estructura de vistas
        $estructuraCompleta = view('plantillas/encabezado').view('plantillas/cuerpo',$datos);
        
        return $estructuraCompleta;
    }
    public function editar()
    {
        /**
         * Se busca al personaje por su nombre con una consulta where
         */
        $personajesBD = $this->conectarBD();

        $personaje = $personajesBD->where('nombre',$_GET['nombre'])->findALL();
        $datos = array('personaje' => $personaje);
        $estructuraCompleta = view('plantillas/encabezado').view('plantillas/editar',$datos);
        
        return $estructuraCompleta;
    }
    public function guardar() {
        $personajesBD = $this->conectarBD();

        $nuevoPersonaje = ['nombre'=>'','miniatura'=>''];

        $nuevoPersonaje['nombre'] = $_POST['nombre'];
        $nuevoPersonaje['miniatura'] = $_POST['miniatura'];        

        $personajesBD->save($nuevoPersonaje);       
        
        return redirect()->back()->withInput();   
    }
    public function eliminar()
    {
        $personajesBD = $this->conectarBD();

        $nombre = $_GET['nombre'];
        $personajesBD->where('nombre',$nombre)->delete();

        return redirect()->back()->withInput();
    }
    public function actualizar(){
        $personajesBD = $this->conectarBD();

        $nuevoPersonaje = ['nombre'=>'','miniatura'=>''];

        $nuevoPersonaje['nombre'] = $_POST['nombre'];
        $nuevoPersonaje['miniatura'] = $_POST['miniatura'];        

        $personajesBD->where('nombre',$nuevoPersonaje['nombre'])
        ->set(['miniatura'=>$nuevoPersonaje['miniatura']])
        ->update();
        
        return redirect()->to('enlistados');
    }
    public function buscar()
    {
        /**
         * Se busca al personaje por nombre, si no lo encuentra entonces no se
         * mostrara nada en la vista
         */
        $personajesBD = $this->conectarBD();

        $buscado['nombre'] = $_GET['buscador'];
        $personaje = $personajesBD->where('nombre',$buscado['nombre'])->findAll();

        $this->session->set('encontrado', $personaje);        
        return redirect()->to('enlistados');        
    }
    public function regresar(){
        return redirect()->to('enlistados');
    }
}