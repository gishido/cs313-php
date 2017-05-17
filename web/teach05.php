<!--<!DOCTYPE html>
<html>
<body>

 <?php
/*    try
    {
    $user = 'postgres';
    $password = 'gishido';
    $db = new PDO('pgsql:host=127.0.0.1;dbname=registration', $user, $password);
    }
    catch (PDOException $ex)
    {
    echo 'Error!: ' . $ex->getMessage();
    die();
    }

    foreach ($db->query('SELECT ward FROM ward') as $row)
    {
    echo 'ward: ' . $row['ward'];
    echo '<br/>';
    }*/
?> 

</body>
</html> -->

<html>
<body>
<h1>Scripture Resources</h1>
<?php

    /*$dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
*/


    // default Heroku Postgres configuration URL
/*    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:gishido@localhost:5432/scriptures";
    }

    $dbopts = parse_url($dbUrl);

   /* print "<p>$dbUrl</p>\n\n";*/

/*    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');*/

    //print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";
    $dbUser = 'postgres';
    $dbPassword = 'gishido';

    try {
    /*$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);*/
    $db = new PDO("pgsql:host=127.0.0.1;dbname=scriptures",$dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
    }

    $stmt = $db->prepare('SELECT * FROM scriptures');
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
/*    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        echo $rows['book']." ".$rows['chapter'].":".$rows['verse']." - ";
        echo '"' . $rows['content'] . '"';
        echo '<br/>';
        echo '<br/>';
    }*/
    foreach($rows as $row)
    {
        echo "<strong>".$row['book']." ".$row['chapter'].":".$row['verse']."</strong> - ";
        echo '"' . $row['content'] . '"';
        echo '<br/>';
        echo '<br/>';
    }

 

/*    foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row)
    {
        echo $row['book']." ".$row['chapter'].":".$row['verse']." - ";
        echo '"' . $row['content'] . '"';
        echo '<br/>';
        echo '<br/>';
    }*/
/*
    foreach ($db->query('SELECT now()') as $row)
    {
    print "<p>$row[0]</p>\n\n";
    }*/

?>

</body>
</html>