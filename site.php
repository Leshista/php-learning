<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php learning dummy site</title>
</head>

<body>
    <?php include "header.html" ?>

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

    <?php if (isset($_GET["color"]) && isset($_GET["plural"]) && isset($_GET["person"])) :
        $color = $_GET["color"];
        $plural = $_GET["plural"];
        $person = $_GET["person"];
        echo "Roses are $color", "<br>";
        echo "$plural are blue", "<br>";
        echo "I love $person", "<br>";
    endif ?>

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

    <?php
    if (isset($_POST["things"])) {
        $things = $_POST["things"];
        echo $things[0], "<br>";
    }
    ?>

    <!-- Functions -->
    <?php
    function sayHi($name)
    {
        echo "hello $name", "<br>";
    }
    sayHi('mf');
    ?>

    <!-- If -->
    <?php
    $isTrue = false;
    if ($isTrue) {
        echo "True", "<br>";
    } else {
        echo "False", "<br>";
    }
    ?>

    <!-- Including files -->
    <?php
    // In php there's no need to pass props to components
    // We just declare variables and then include the component
    // That needs them
    $title = "The post";
    $author = "The author";
    $wordCount = 42;
    include "article-header.php";
    echo "<br>";
    ?>

    <!-- Classes -->
    <?php
    class Book
    {
        public $title; // var $smth instead of 'this.smth = smth' in js
        public $author;
        private $pagesCount;

        function getPagesCount()
        {
            return $this->pagesCount;
        }

        function setPagesCount($pagesCount)
        {
            if (gettype($pagesCount) == "integer") {
                $this->pagesCount = $pagesCount;
            } else {
                echo gettype($pagesCount), "<br>";
            }
        }

        function isALongBook()
        {
            switch ($this->pagesCount) {
                case ($this->pagesCount > 500):
                    echo "That's a long one. <br>";
                    break;
                case ($this->pagesCount < 500):
                    echo "That's a short one. <br>";
                    break;
                default:
                    echo "That's not a book! <br>";
                    break;
            }
        }

        function __construct($title, $author, $pagesCount)
        {
            $this->title = $title;
            $this->author = $author;
            $this->setPagesCount($pagesCount);
        }
    }

    $book1 = new Book("The Fallen Empire", "Brando Sando", 400);
    echo $book1->title, "<br>";
    $book2 = new Book("The Fellowship of the Ring", "J.R.R.Tolkien", 1000);
    echo $book2->author, "<br>";
    $book3 = new Book("Boulvard of Nowhere", "Me", 500);
    $book1->isALongBook();
    $book2->isALongBook();
    $book3->isALongBook();
    ?>

    <!-- Working with file sistem -->
    <?php
    // Magic constants
    echo __DIR__, "<br>";
    echo __FILE__, "<br>";
    echo __LINE__, "<br>";
    // Posting and deleting
    mkdir('новая папка');
    rename('новая папка', "newdir");
    rmdir('newdir');
    // Reading
    echo file_exists('site.php'), "<br>";
    echo is_dir('.'), "<br>";
    echo is_file('./site.php'), "<br>";
    echo file_get_contents("dummy.html");
    var_dump(scandir('./'));
    // Putting
    file_put_contents("dummy2.html", "<h2>I've been created by a script!</h2>");
    echo file_get_contents("dummy2.html");
    ?>
    <!-- cURL read -->
    <?php
    $url = "https://jsonplaceholder.typicode.com/posts";
    $resource = curl_init($url); // Initializing cURL with provided url
    curl_setopt($resource, CURLOPT_SSL_VERIFYHOST, false); // Disabling SSL certificate cheking; otherwise error i'm too lazy to fix properly
    curl_setopt($resource, CURLOPT_SSL_VERIFYPEER, false); // Same
    var_dump($info = curl_getinfo($resource)); // get info of response
    echo "<br><hr>";
    $result = curl_exec($resource); // Doing what needs to be done
    if (curl_errno($resource)) { // if curl has returned false
        echo 'Curl error: ' . curl_error($resource); // print error
    }
    echo $result, "<br><hr>";
    curl_close($resource); // End the cURL
    ?>
    <!-- cURL post -->
    <?php
    $url = "https://jsonplaceholder.typicode.com/posts";
    $user = [
        "name" => "Zoro",
        "profession" => "PirateHunter"
    ];
    $resourse = curl_init($url);
    curl_setopt_array($resource, [
        CURLOPT_URL => $url,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HEADER => ['content-type: application/json'],
        CURLOPT_POSTFIELDS => json_encode($user)
    ]);
    $result = curl_exec($resourse);
    curl_close($resource);
    echo $result;
    ?>
    <?php include "footer.html" ?>
</body>

</html>