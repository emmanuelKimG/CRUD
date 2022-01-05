<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">  
    <title>Agregar Registro</title>
</head>
<body>  
    <div class="d-flex align-self-center justify-content-center mt-5 border">
        <form method="POST" action="http://localhost/CrudSimple/">
            <label for="nombre">Nombre</label> <input type="text" name="nombre" required>
            <label for="lenguaje">Lenguaje</label> <input type="text" name="lenguaje" required>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>