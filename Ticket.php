<?php

$cestaFrutas = ['Peras'=>2.15, 'Limones'=>0.80, 'Cerezas'=>1.20, 'Naranjas'=>2.40, 
    'Uvas'=>2.85, 'Manzanas'=>1.30];
//var_dump($cestaFrutas);
$totalKilos = 0;
$maximoKilos = 10;
$numeroFrutas = 0;
$totalEuros=0; 
$maximoPrecio = 20;
//Usaremos la variable tabla para almacenar el html
$ticket= "<table border=1px;>";
$ticket.="<tr>";
$ticket.="<th> Frutas </th>";
$ticket.="<th> Cantidad </th>";
$ticket.="<th> Precio </th>" ;   
$ticket.="</tr>";

foreach ($cestaFrutas as $fruta=>$precio) {
    //generamos los kilos de una fruta
    $kilos = rand(0, 5);
    //Calculamos el total de la línea.
    $preciolinea=$kilos*$precio;
    //si es 0 nos saltamos todo para esa $fruta
    if ($kilos == 0) {
        continue;
    }
    //los sumamos a los que llevamos
    $totalKilos = $totalKilos + $kilos;
    //si nos pasamos se acabó la compra!!
    if ($totalKilos > $maximoKilos) {
     //restamos los kilos sobrantes 
         $totalKilos = $totalKilos - $kilos;
        break;
    }
   

    //pedimos al tendero/a
    $numeroFrutas++;
    $ticket .= "<tr>" . "<td>$fruta</td>" . "<td>$kilos</td>" . "<td> $preciolinea €</td>" . "</tr>";
    
    $totalEuros = $totalEuros + $preciolinea;
      if ($totalEuros >= $maximoPrecio) {
     //restamos los euros sobrantes 
         $totalEuros = $totalEuros - $preciolinea;
     break;
     
     }
}

$ticket .= "<tr>" . "<th>TOTAL</th>" . "<td>$totalKilos</td>" . "<td>$totalEuros</td>" . "</tr>";
$ticket .= "</table>";
echo $ticket;


