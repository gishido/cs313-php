<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<body>
<h1>Scripture Resources</h1>
<hr>
<?php

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

    //variables
    $book = $_POST['book'];
    $chapter = $_POST['chapter'];
    $verse = $_POST['verse'];
    $content = $_POST['content'];
    
    $topicsql = 'INSERT INTO topic_guide (scriptid, topic) VALUES(?,?)';
    $scripture = 'INSERT INTO scriptures (book, chapter, verse, content) 
        VALUES(?,?,?,?)';

    $stmt = $db->prepare($scripture);
    $stmt->bindParam(1,$book);
    $stmt->bindParam(2,$chapter);
    $stmt->bindParam(3,$verse);
    $stmt->bindParam(4,$content);
    $stmt->execute();

    $scriptureid = $db->lastInsertId('scriptures_id_seq');
    /*echo "<br>".$scriptureid."<br>";*/

    $stmt = $db->prepare($topicsql);
    foreach($_POST['topic'] as $topic)
    {
                
        $stmt->bindParam(1,$topicid);
        $stmt->bindParam(2,$scriptureid);
        $stmt->execute();
    }

    $queryall = 'SELECT book, chapter, verse, content, name as topic
                    FROM scriptures s
                    JOIN topic_guide tg
                        on s.id = tg.scriptid
                    LEFT JOIN topic t
                        on tg.topic = t.topicid';
    
    $stmt = $db->prepare($queryall);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach($rows as $row)
    {
        echo "<strong>".$row['book']." ".$row['chapter'].":".$row['verse']."</strong> - ";
        echo '"' . $row['content'] . '"';
        echo '<br/>';
        echo $row['name'];
        echo '<br/>';
        echo '<br/>';
    }


?>

</body>
</html>