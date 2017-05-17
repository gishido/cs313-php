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

<?php

    $dbUrl = getenv('DATABASE_URL');

    $dbopts = parse_url($dbUrl);

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);



/*    // default Heroku Postgres configuration URL
    $dbUrl = getenv('DATABASE_URL');

    if (empty($dbUrl)) {
    // example localhost configuration URL with postgres username and a database called cs313db
    $dbUrl = "postgres://postgres:gishido@localhost:5432/registration";
    }

    $dbopts = parse_url($dbUrl);

    print "<p>$dbUrl</p>\n\n";

    $dbHost = $dbopts["host"];
    $dbPort = $dbopts["port"];
    $dbUser = $dbopts["user"];
    $dbPassword = $dbopts["pass"];
    $dbName = ltrim($dbopts["path"],'/');

    print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

    try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    }
    catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
    }

    foreach ($db->query('SELECT now()') as $row)
    {
    print "<p>$row[0]</p>\n\n";
    }*/

?>

</body>
</html>