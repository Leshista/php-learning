<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php learning dummy site</title>
</head>

<body>
    <?php
    // Basic Data Types
    $string = "To be or not to be";
    $int = 1;
    $float = 1.310230123120;
    $boolean = true;
    $null = null;

    // String functions
    echo strtoupper($string), "<br>"; // like toUpperCase in js
    echo strlen($string), "<br>"; // like string.length in js
    echo $string[0], "<br>";
    echo str_replace("b", "se", $string), "<br>"; // like replace in js
    echo substr($string, 6, 2), "<br>"; // like slice in js

    // Number functions
    echo abs(-100), "<br>";
    echo pow(4, 2), "<br>"; // 4^2
    echo sqrt(144), "<br>";
    echo max(1, 2, 5), "<br>";
    echo min(1, 2, 3, 4, 5, 5), "<br>";
    echo round(1.012030123012030), "<br>"; // there is also ceil() and floor()
    ?>
    <!-- User interacion/Forms -->
    <form action="site.php" method="GET">
        Name: <input type="text" name="name">
        <input type="submit" value="Sumbit">
    </form>

    <?php
    echo $_GET["name"];
    ?>
</body>

</html>