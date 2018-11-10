<?php

$hamburgerPrice = 4.95;
$hamburgerQuantity = 2;
$milkShakePrice = 1.95;
$milkShakeQuantity = 1;
$cocaColaPrice = 0.95;
$cocaColaQuantity = 1;
$percentForTips = 0.16;
$percentForTax = 0.075;

$netbill = $hamburgerPrice * $hamburgerQuantity + $milkShakePrice * $milkShakeQuantity + $cocaColaPrice * $cocaColaQuantity;
$tips = $netbill * $percentForTips;
$tax = $netbill * $percentForTax;
$total = $netbill + $tips + $tax;

$y=1;
 for ($x = 1; $x <= 5; $x++) 
 {
     $y *= 2**2;
    echo "The number is: $y <br>";
 }

 $n = 1; $p = 2; print "$n, $p\n";
$n++; $p *= 2; print "$n, $p\n";
$n++; $p *= 2; print "$n, $p\n";
$n++; $p *= 2; print "$n, $p\n";
$n++; $p *= 2; print "$n, $p\n";

$hamburger = 4.95;
$shake = 1.95;
$cola = 0.85;



/* print <<<HTMLBLOCK
<html>
<head><title>Menu</title></head>
<body bgcolor="#fffed9">
<h1>Dinner</h1>
<ul>
<li> hamburger price $hamburgerPrice quantity $hamburgerQuantity
<li> milk shake price $milkShakePrice quantity $milkShakeQuantity
<li> coca cola price $cocaColaPrice quantity $cocaColaQuantity
</ul>
<h3>meal cost is $netbill USD</h3>
 <h5>tips $tips</h5>
 <h5>tax $tax</h5>
 <h2>Total $total USD</h2>

</body>
</html>
HTMLBLOCK; */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Dinner</h1>
<ul>
<li> hamburger price <?= $hamburgerPrice ?> quantity <?=$hamburgerQuantity ?>
<li> milkshake price <?= $milkShakePrice ?> quantity <?=$milkShakeQuantity ?>
<li> coca cola price <?= $cocaColaPrice ?> quantity <?= $cocaColaQuantity ?>
</ul>
<h3>meal cost is $netbill USD</h3>
 <h4><?php printf('tips %.2f', $tips);?></h5>
 <h4><?php printf('tax %.2f', $tax);?></h5>
 <h2><?php printf('Total %.2f', $total);?> USD</h2>
</body>
</html>