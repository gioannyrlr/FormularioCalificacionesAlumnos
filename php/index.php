<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=from, initial-scale=1.0">
    <title>Calificaciones de alumnos</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../css/styles.css">

     <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <h1>Calificaciones de alumnos</h1>
    <form action="datos.php" method="post">
        <label>Tarjetas de datos</label><br>
        <input type="number" name="cant" id="input" min="1" placeholder="Cantidad" required><br><br>
        <a href="index.php"><input type="button" name="limpiar" id="back" value="Limpiar"></a>
        <input type="submit" name="inputs" id="button" value="Continuar">
    </form>


</body>
</html>