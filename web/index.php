<!DOCTYPE html>
<html>
<head>
  <title>CS313 - Teach02</title>
  <!-- http://getbootstrap.com/getting-started/ - Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- internal css stylesheet -->
  <link rel="stylesheet" type="text/css" href="default.css">
    <!-- http://getbootstrap.com/getting-started/ - Latest compiled and minified JavaScript -->
  <script 
    src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
  </script>
  <!-- inertal javascript file -->
  <script src="default.js"></script>
</head>
<body>
<h1>
  <?php
    echo "<center>";
    echo 'Adam Shumway - Teach02 - CS313!';
    echo "</center>";
  ?>
</h1>
<div class="container" id=button1>
  <button type="button" class="btn btn-default hover-bold" onclick="clickMe();">Click Me!</button>
</div>
<div class="container" id=button2>
  <button type="button" class="btn btn-default hover-bold" onclick="clickMe();">Click Me!</button>
</div>
<div class="container" id=button3>
  <button type="button" class="btn btn-default hover-bold" onclick="clickMe();">Click Me!</button>
</div>
</body>
</html>


