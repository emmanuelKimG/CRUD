<?php
require_once("db/connection.php");

class registro{
        private $conexion;

        function crearConexion(){
            $this->conexion = connection::conexion();
            return $this->conexion;
        }

        function pullData(){
            $sttm = $this->conexion->prepare("SELECT lenguajes.id_lengua, lenguajes.nombre, paises.nombrePais, paises.id_pais
            FROM lenguajes
            INNER JOIN paises ON lenguajes.id_lengua = paises.id_lengua;");

            $sttm->execute(); 
            $resutado = $sttm->fetchAll();      
            $lenguas = [];
            $map = array_column($resutado, 'nombre','nombrePais');
            $cont = array_count_values($map);
       
            foreach($resutado as $r => $data){
                if(!in_array($data["id_lengua"],$lenguas)){
                    if($cont[$data["nombre"]] > 0){
                        echo '<tr><td>' . $data["nombre"] .'</td><td>';
                        //Se imprime el ID, el nombre De la lengua y se hace un foreach para imprimir los paises
                        foreach($map as $pais => $lang){
                            if($lang == $data["nombre"]){
                                echo $pais . "<br>"; 
                            }                
                        }
                        echo '</td><td>';
                        //Colocamos los botones de Modificar y Eliminar
                        foreach($map as $pais => $lang){
                            if($lang == $data["nombre"]){
                                echo  '<a href="vistas/modificar.php?&id='. $pais .'&name='. $data["nombre"] .'"<i class="fa fa-pencil" aria-hidden="true"></i></a>' .  
                                '<a class="eliminar" href="?a=2&id='. $pais .'"><i class="fa fa-trash mt-1" aria-hidden="true" style="padding-left:25px"></i></a>' ;
                            }
                        } 
                        echo "</td></tr>";
                    }
                } $lenguas [] = $data["id_lengua"];
            }          
        }

        function addData(String $nombre, String $lengua){
            $sttm = $this->conexion->prepare("INSERT INTO paises(nombrePais, id_lengua) VALUES (?, ?)");
            $resultado = $sttm->execute([$nombre, $lengua]);
            $resutado = $sttm->fetchAll();
        }

        function getPaisId(String $pais) {
            $sttm = $this->conexion->prepare("SELECT id_pais FROM paises WHERE nombrePais = ?");
            $sttm->execute([$pais]);
            $resultado = $sttm->fetchAll();
            return $resultado;
        }

        function getLangId(String $lengua) {
            $sttm = $this->conexion->prepare("SELECT id_lengua FROM lenguajes WHERE nombre = ?");
            $resultado =$sttm->execute([$lengua]);
            $resultado = $sttm->fetchAll();
            return $resultado;
        }

        function deleteData(int $id){
            $sttm = $this->conexion->prepare("DELETE FROM paises WHERE id_pais = ?");
            $sttm->execute([$id]);
            $resultado = $sttm->fetch();
        }

        function update(String $nombre,int $idLengua, int $idPais){
            $sttm = $this->conexion->prepare("UPDATE paises SET nombrePais = ? , id_lengua = ? WHERE id_pais = ?");
            $sttm->execute(array($nombre, $idLengua, $idPais));
            $resutado = $sttm->fetch();
        }
    }

