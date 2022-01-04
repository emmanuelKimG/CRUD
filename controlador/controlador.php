<?php
include_once("Modelo/registro.php");

$pais = new registro();
$pais->crearConexion();

// Agregar Un nuevo Pais

    if(isset($_POST['nombre'])){
        if(isset($_POST['lenguaje'])){
            $lang = $pais->getLangId($_POST['lenguaje']);
            $pais->addData($_POST['nombre'] ,$lang[0][0]);
            $_POST = [];
            header("Location: ../CrudSimple");
        }
    }

// Modificar El pais
    if(isset($_POST["Mlengua"])){
        if(isset($_GET["id"])){
            if(isset($_POST["Mpais"])){
                $idPais = $pais->getPaisId($_GET["id"]);
                $idLang = $pais->getLangId($_POST["Mlengua"]);
                $pais->update($_POST["Mpais"], $idLang[0][0] , $idPais[0][0]);
                $_POST= array();
                $_GET= array();
                header("Location: ../CrudSimple");
            }
        }
    }

// Eliminar el Pais
if(isset($_POST["idD"])){
    echo $_POST["idD"];
}
if(isset($_GET['a'])){
    if($_GET['a'] == 2){
        $paisId = $pais->getPaisID($_GET["id"]);
        $pais-> deleteData($paisId[0][0]);
        $_GET = array(); 
        header("Location: ../CrudSimple");   
    }
}
    $pais->pullData();


