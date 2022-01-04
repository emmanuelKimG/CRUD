<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    <title> Crud</title>
</head>
<body>
    <h1 class="header text-center text-primary"> CRUD DE PAISES</h1>
    <div class="jumbotron">
        <nav class="navbar navbar-expand justify-content-evenly navbar-light col-6 m-auto p-2 " style="background-color: #e3f2fd;">
            <ul class="navbar-nav">
                <li class="navbar-item">
                    <a class="nav-link" href="vistas/nuevo-form.php"> Agregar Pais</a>
                </li>
            </ul>
        </nav>
        <div class="container well-sm col-6">
            <table class="table">
                <thead class="thead thead-dark">
                    <tr>
                        <th>Lengua</th>
                        <th>Paises</th>
                        <th style="width:80px">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include_once "controlador/controlador.php";
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        let clases = document.getElementsByClassName('eliminar');
        for( elementos of clases){
            elementos.addEventListener("click", () => {
                let confirmacion = confirm("Seguro que desea eliminar el Registro?");
                if(confirmacion == true){
                    $.ajax({
                        url: "controlador.php",
                        method: "POST",
                        data: { idD : 5 },
                        dataType: "html"
                    })
                }
            });
        }

    </script>
</body>
</html>