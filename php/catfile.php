<?php
$minInterval = 5 * 60; // 5 minutes
$access = true;

if (file_exists('../visitor')) {
  $visitor = unserialize(file_get_contents('../visitor'));

  if ($visitor['addr'] != $_SERVER['REMOTE_ADDR']) {
    $access = false;
  }
}
else {
  exit('<h1>Access denied.</h1>');
}

if (!$access) {
  exit('<h1>Access denied.</h1>');
}

$file = $_POST["file"];
$test = "";
$raw_data = [];
$formatted_data = [];

$data = file_get_contents("/etc/netctl/" . $file);
foreach(explode("\n", $data) as $line) {
  if($line != "") {
    $raw_data = explode("=", $line);
    $formatted_data[$raw_data[0]] = $raw_data[1];
  }
}
echo json_encode($formatted_data);

?>
