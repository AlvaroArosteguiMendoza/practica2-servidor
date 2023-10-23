<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programación basada en lenguaje de marcas con código embebido I</title>
    <style>
        body{
            background-color:black;
        }
        .container{
            width:80%;
            margin:auto;
            color: white;
            text-align:center;
        }
        h1{
            font-family: 'ARIAL', 'serif';
            color:orange;
            -webkit-text-stroke: 1px #000;
            text-transform: uppercase;
        }
        h2{
            font-family: 'ARIAL', 'serif';
            color:yellow;
            text-transform: uppercase;
            -webkit-text-stroke: 1px #000;
        }
        .ejersisio{
            text-align: justify;
            padding-left:470px;
        }
        .button {
	box-shadow:inset 0px 1px 0px 0px #4d194d;
	background:linear-gradient(to bottom, #ab973f 5%, #f09e05 100%);
	background-color:#ab973f;
	border-radius:6px;
	border:1px solid #3b1007;
	display:inline-block;
	cursor:pointer;
	color:#000000;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:14px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ded17c;
}
.button:hover {
	background:linear-gradient(to bottom, #f09e05 5%, #ab973f 100%);
	background-color:#f09e05;
}
.button:active {
	position:relative;
	top:1px;
}
    </style>
</head>
<body>
    <div class="container">
    <h1>Programación basada en lenguaje de marcas con código embebido I</h1>

    <h2>Ejercicio 1: gastos de envío</h2>
    <div class="ejersisio">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="precio">Precio total de la cesta:</label>
        <input type="text" name="precio" id="precio" required>
        <input class="button" type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precioCesta = $_POST["precio"];

        if ($precioCesta < 50) {
            $gastosEnvio = 3.95;
        } elseif ($precioCesta < 75) {
            $gastosEnvio = 2.95;
        } elseif ($precioCesta < 100) {
            $gastosEnvio = 1.95;
        } else {
            $gastosEnvio = 0;
        }

        echo "<div class='resultados'>";
        echo "<p>Precio de la cesta: " . $precioCesta . "€</p>";
        echo "<p>Gastos de envio: " . $gastosEnvio . "€</p>";
        echo "</div>";
    }
    ?>
    </div>
    <h2>Ejercicio 2:  gastos de envío con switch-case</h2>
    <div class="ejersisio">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="precio_switch">Precio total:</label>
        <input type="text" name="precio_switch" id="precio_switch" required>
        <input  class="button" type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precioCestaSwitch = $_POST["precio_switch"];

        switch (true) {
            case $precioCestaSwitch < 50:
                $gastosEnvioSwitch = 3.95;
                break;
            case $precioCestaSwitch < 75:
                $gastosEnvioSwitch = 2.95;
                break;
            case $precioCestaSwitch < 100:
                $gastosEnvioSwitch = 1.95;
                break;
            default:
                $gastosEnvioSwitch = 0;
                break;
        }

        echo "<div class='resultados'>";
        echo "<p>Precio de la cesta: " . $precioCestaSwitch . "€</p>";
        echo "<p>Gastos de envio: " . $gastosEnvioSwitch . "€</p>";
        echo "</div>";
    }
    ?>
     </div>
    <h2>Ejercicio 3: Número Mayor</h2>
    <div class="ejersisio">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="num1">Número 1:</label>
        <input type="text" name="num1" id="num1" required><br>
        <label for="num2">Número 2:</label>
        <input type="text" name="num2" id="num2" required><br>
        <label for="num3">Número 3:</label>
        <input type="text" name="num3" id="num3" required><br>
        <label for="num4">Número 4:</label>
        <input type="text" name="num4" id="num4" required><br>
        <label for="num5">Número 5:</label>
        <input type="text" name="num5" id="num5" required><br>
        <input class="button" type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        $num3 = $_POST["num3"];
        $num4 = $_POST["num4"];
        $num5 = $_POST["num5"];

        $mayor = $num1;

        $numeros = [$num2, $num3, $num4, $num5];

        foreach ($numeros as $numero) {
            if ($numero > $mayor) {
                $mayor = $numero;
            }
        }

        echo "<div class='resultados'>";
        echo "<p>El número más grande de los cinco es el " . $mayor . "</p>";
        echo "</div>";
    }
    ?>
    </div>
    <h2>Ejercicio 4: Matriz (foreach)</h2>
    <div class="ejersisio">
    <?php
    $matriz = [[3, 1], [2, 0]];

    echo "<div class='resultados'>";
    echo "<table>";
    foreach ($matriz as $fila) {
        echo "<tr>";
        foreach ($fila as $elemento) {
            echo "<td>" . $elemento . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>
     </div>
    <h2>Ejercicio 5: Suma de matrices</h2>
    <div class="ejersisio">
    <?php
    $matriz1 = [[1, 0], [0, 1]];
    $matriz2 = [[0, 1], [1, 0]];

    $resultado = [];

    for ($i = 0; $i < count($matriz1); $i++) {
        for ($j = 0; $j < count($matriz1[$i]); $j++) {
            $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
        }
    }

    echo "<div class='resultados'>";
    echo "<table>";
    foreach ($resultado as $fila) {
        echo "<tr>";
        foreach ($fila as $elemento) {
            echo "<td>" . $elemento . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    ?>  
     </div>
    </div>
</body>
</html>