<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title> MODIFICAR REGISTRO</title>
</head>
<body>
    <?php
        $id= $_GET['id'];
    ?>
    <div class="flex-container text-center align-items-center ">
        <form action="http://localhost/CrudSimple/?id=<?php echo ($id); ?>"method="POST">
            <h2 class="h2">Modifique los datos que Desea Cambiar</h2>
            <label for="nombre">Lenguaje</label><input type="text" name="Mlengua" value="<?php  echo $_GET['name']?>" required>
            <label for="lenguaje">Pais</label><input type="text" name="Mpais" value ="<?php echo $_GET['id'] ?>" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>