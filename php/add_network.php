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

$description = $_POST['description'];
$interface = $_POST['interface'];
$security = strtolower($_POST['security']);
$essid = $_POST['essid'];
$key = $_POST['key'];
$connection = "wireless";
$ip = "dhcp";

$data = "Description='" . $description . "'\n"
  .	"Interface=" . $interface . "\n"
  .	"Connection=wireless\n"
  .	"Security=" . $security . "\n"
  .	"ESSID=" . $essid . "\n"
  .	"IP=dhcp\n"
  .	"Key=" . $key . "\n";

file_put_contents("/etc/netctl/" . $interface . "-" . $essid, $data);
header("Location: http://".$_SERVER['HTTP_HOST']."/");
exit;

?>
