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
    echo substr($string, 6, 2); // like slice in js
    ?>
</body>

</html>