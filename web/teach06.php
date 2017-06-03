<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<body>
<h1>Scripture Resources</h1>
<hr>
<?php

    echo "<form action='teach06-02.php' method='post'>";
    echo "<p>Book:";
    echo "<input type='text' name='book'></p>";
    echo "<p>Chapter:";
    echo "<input type='text' name='chapter'></p>";
    echo "<p>Verse:";
    echo "<input type='text' name='verse'></p>";
    echo "<p>Content:";
    echo "<textarea name='content' rows='3' cols='70'></textarea></p>";

    // default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
        // example localhost configuration URL with postgres username and a database called cs313db
        //$dbUrl = "postgres://svcphp:cs313rules!@localhost:5432/scriptures";
        $dbUrl = "postgres://svcphp:cs313rules!@localhost:5432/scriptures";
    }

    $dbopts = parse_url($dbUrl);

   /* print "<p>$dbUrl</p>\n\n";*/

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    //print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

    try {
        $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
    }

    $sql = 'SELECT topicid, name FROM topic';
    $statement = $db->query($sql);

    echo "<p>";
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        echo "<input type='checkbox' name='topic[]' value='".$row['topicid']."'>".$row['name'];
    }
    echo "</p>";

    echo "<br><input type='submit' value='insert'><br>";

    echo "</form>";

?>

</body>
</html>