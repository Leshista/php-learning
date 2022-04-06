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
    $array = array(1, 2, "name", true);
    echo count($array), "<br>"; // equal to array.length in js
    $people = array("marina" => 34, "nikita" => 50); // assosiative arrays (A.K.A. js objects)
    echo $people["marina"], "<br>";

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

    <?php if (isset($_GET["name"])) : ?>
        <?php echo $_GET["name"] ?>
    <?php endif; ?>

    <!-- A calculator -->

    <form action="site.php" method="GET">
        <input type="number" name="first_number">
        <br>
        <input type="number" name="second_number">
        <br>
        <input type="submit" value="Sumbit">
    </form>

    <?php if (isset($_GET["first_number"]) && isset($_GET["second_number"])) : ?>
        <?php echo $_GET["first_number"] + $_GET["second_number"] ?>
    <?php endif; ?>

    <!-- A mad Libs Game -->

    <form action="site.php" method="GET">
        Color: <input type="text" name="color"><br>
        Plural: <input type="text" name="plural"><br>
        Person: <input type="text" name="person"><br>
        <input type="submit" value="Sumbit">
    </form>

    <?php if (isset($_GET["color"]) && isset($_GET["plural"]) && isset($_GET["person"])) : ?>
        <?php
        $color = $_GET["color"];
        $plural = $_GET["plural"];
        $person = $_GET["person"];
        echo "Roses are $color", "<br>";
        echo "$plural are blue", "<br>";
        echo "I love $person", "<br>";
        ?>
    <?php endif; ?>

    <!-- Arrays in forms -->
    <form action="site.php" method="post">
        A: <input type="checkbox" name="things[]" value="a">
        <br>
        B: <input type="checkbox" name="things[]" value="b">
        <br>
        C: <input type="checkbox" name="things[]" value="c">
        <br>
        <input type="submit" value="Sumbit">
    </form>

    <?php if (isset($_POST["things"])) : ?>
        <?php
        $things = $_POST["things"];
        echo $things[0], "<br>";
        ?>
    <?php endif ?>

    <!-- Functions -->
    <?php
    function sayHi($name)
    {
        echo "hello $name";
    };
    sayHi('mf');
    ?>

</body>

</html>