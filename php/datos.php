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

<?php 

if(isset($_POST['inputs'])){
?>
    <div class="center">
        <div class="row">
            <div class="col text-center"><label class="encabez">C.I.</label></div>
            <div class="col text-center"><label class="encabez">Nombre</label></div>
            <div class="col text-center"><label class="encabez">Matemáticas</label></div>
            <div class="col text-center"><label class="encabez">Física</label></div>
            <div class="col text-center"><label class="encabez">Programación</label></div>
        </div>
    </div>
<?php
    $cant=$_POST['cant'];
    for($j=0; $j<$cant; $j++){ 
?>
        <form action="resultados.php" method="post">
            <input type="number" maxlength="8" name="cedula[]" id="input" placeholder="Cédula de identidad" required>
            <input type="text" name="nombre[]" id="input" pattern="[a-z A-Z]+" oninvalid="this.setCustomValidity('Sólo puedes ingresar letras.')" placeholder="Nombre" required>
            <input type="number" max="20" min="1" name="matematicas[]" id="input" placeholder="Calificación" required>
            <input type="number" max="20" min="1" name="fisica[]" id="input" placeholder="Calificación" required>
            <input type="number" max="20" min="1" name="programacion[]" id="input" placeholder="Calificación" required><br><br>
<?php 
    }
} 
?>
            <a href="index.php"><input type="button" name="volver" id="back" value="Volver"></a>
            <input type="submit" name="enviar" id="button" value="Enviar">
        </form>

<?php
if(isset($_POST['enviar'])){

    $cedula=$_POST['cedula'];
    $nombre=$_POST['nombre'];
    $matematicas=$_POST['matematicas'];
    $fisica=$_POST['fisica'];
    $programacion=$_POST['programacion'];


    // Nota promedio de cada materia
    $cant_m = count($matematicas);
    $suma_m = array_sum($matematicas);
    $prom_m = round($suma_m / $cant_m,2);

    $cant_f = count($fisica);
    $suma_f = array_sum($fisica);
    $prom_f = round($suma_f / $cant_f,2);

    $cant_p = count($programacion);
    $suma_p = array_sum($programacion);
    $prom_p = round($suma_p / $cant_p,2);


    // Alumnos aprobados y reprobados en cada materia.
    $aprobados_m = 0;
    $reprobados_m = 0;
    foreach ($matematicas as $mate => $notas_m){
        if($notas_m >= 10){
            $aprobados_m++;
        }else{
            $reprobados_m++;
        }
    }
    
    $aprobados_f = 0;
    $reprobados_f = 0;
    foreach ($fisica as $fisi => $notas_f){
        if($notas_f >= 10){
            $aprobados_f++;
        }else{
            $reprobados_f++;
        }
    }
    
    $aprobados_p = 0;
    $reprobados_p = 0;
    foreach ($programacion as $program => $notas_p){
        if($notas_p >= 10){
            $aprobados_p++;
        }else{
            $reprobados_p++;
        }
    }


    // Alumnos que aprobaron todas las materias, una sola materia y dos materias.
    $aprobados = 0;
    $aprobados_una = 0;
    $aprobados_dos = 0;

    for($i=0; $i<count($nombre); $i++){

        // Todas las materias aprobadas.
        if($matematicas[$i] >= 10 && $fisica[$i] >= 10 && $programacion[$i] >= 10){
            $aprobados += 1;
        }
    
        // Una materia aprobada.
        if(($matematicas[$i] >= 10) && ($fisica[$i] <= 10) && ($programacion[$i] <= 10)){
            $aprobados_una += 1;
        }elseif(($fisica[$i] >= 10) && ($matematicas[$i] <= 10) && ($programacion[$i] <= 10)){
            $aprobados_una += 1;
        }elseif(($programacion[$i] >= 10) && ($matematicas[$i] <= 10)&& ($fisica[$i] <= 10)){
            $aprobados_una += 1;
        }

        // Dos materias aprobadas.
        if(($matematicas[$i] >= 10) && ($fisica[$i] >= 10) && ($programacion[$i] <= 10)){
            $aprobados_dos += 1;
        }elseif(($matematicas[$i] >= 10) && ($fisica[$i] <= 10) && ($programacion[$i] >= 10)){
            $aprobados_dos += 1;
        }elseif(($matematicas[$i] <= 10) && ($fisica[$i] >= 10) && ($programacion[$i] >= 10)){
            $aprobados_dos += 1;
        }
    }


    // Nota maxima en cada materia.
    $max_m = max($matematicas);
    $max_f = max($fisica);
    $max_p = max($programacion);

}
?>

</body>
</html>