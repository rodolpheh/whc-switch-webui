<html>
  <head>
    <META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css">
    <meta charset="utf-8"/> 
    <meta name="viewport" content="width=device-width" />
    
    <title>Jack Dispenser WebUI</title>
    <script src="js/jquery-2.1.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
  </head>
  <body>
  <?php
  
  if($_GET['disconnect'] == 1) {
   include('include/disconnected.php');
  }
  else{
    $minInterval = 5 * 60; // 5 minutes
    $access = true;

    if (file_exists('visitor')) {
      $visitor = unserialize(file_get_contents('visitor'));
      if ($visitor['addr'] != $_SERVER['REMOTE_ADDR']) {
	if ($visitor['time'] + $minInterval >= time()) {
	  $access = false;
	}
      }
    }

    if (!$access) {
      include('include/forbidden.php');
    } 
    else {
      // Update last visitor data
      file_put_contents('visitor', serialize([
	'addr' => $_SERVER['REMOTE_ADDR'],
	'time' => time()
      ]));
      include('include/profiles.php');
    }
  }
  ?> 
  </body>
</html> 
