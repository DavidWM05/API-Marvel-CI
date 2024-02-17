<?php

namespace App\Controllers;

use App\Models\PersonajeModel;

class Home extends BaseController
{
    public function index(): string
    {
        /**
         * Se obtienen los resultados obtenidos por consumir la API
         * y de igual forma los registros de la Base de Datos, para posteriormente
         * compararlos y verificar cuales ya estan enlistados.
         */
        $personajes = $this->conectarBD();
        
        $enlistados = $personajes->findAll();        
        $personajesAPI = $this->consumirAPI();

        $datos = array('personajes' => $personajesAPI,'enlistados'=>$enlistados);
        
        $estructuraCompleta = view('plantillas/encabezado').view('plantillas/cuerpoApi',$datos);
        
        return $estructuraCompleta;        
    }

    //  Funcion Para Guardar Personaje en la BD
    public function enlistar(){        
        $personajesBD = $this->conectarBD();

        $nuevoPersonaje = ['nombre'=>'','miniatura'=>''];

        $nuevoPersonaje['nombre'] = $_GET['nombre'];
        $nuevoPersonaje['miniatura'] = $_GET['miniatura'];        

        $personajesBD->save($nuevoPersonaje);       
        
        return redirect()->back()->withInput();
    }

    //  Funcion Para Consumir API Marvel
    private function consumirAPI(){
        // URL de la API
        $url = 'https://gateway.marvel.com/v1/public/characters?ts=1&apikey=c477e5f41ee39d63f7136766b07c13e5&hash=056ba41ed80d2b2159e5cc05a1dc6b68';
        // Solicitud a la API
        $respuesta = file_get_contents($url);
        // Decodificacion a Json
        $data = json_decode($respuesta, true);
        // Verificar si la decodificación fue exitosa
        if ($data === null) {
            echo "Error al decodificar la respuesta JSON";
        } else {
            $personajesAPI = $data['data']['results'];   // Acceso a los datos a utilizar
            $personajes = array();
            $nombres = array();
            $img = array();
            $id = array();

            foreach ($personajesAPI as $value) {    // Recorrido por todos los personajes
                $personaje = ['nombre'=>'','miniatura'=>''];
                foreach ($value as $key => $data) { // Personaje
                    if($key == "name"){
                        $personaje['nombre'] = $data;                        
                    } elseif($key == "thumbnail"){
                        $pathfull = $data["path"].'.'.$data['extension'];
                        $personaje['miniatura'] = $pathfull;                        
                    }
                }
                array_push($personajes,$personaje);
            }

            return $personajes;
        }
    }

    //  Funcion Axiliar Para Conectar a la Base de Datos
    private function conectarBD(){
        $db = \Config\Database::connect();          //  Conexion a Base de datos
        $personajesBD = new PersonajeModel($db);    //  Modelo de Personaje
        return $personajesBD;
    }
}
