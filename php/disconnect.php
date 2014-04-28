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

unlink("../visitor");

?>