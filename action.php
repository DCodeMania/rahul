<?php
  require_once 'util.php';
  require_once 'db.php';

  $util = new Util;
  $db = new Database;

  // Handle Add New User Ajax Request
  if (isset($_POST['add_user'])) {
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if ($db->insert($fname, $lname, $email, $phone)) {
      echo $util->showMessage('success', 'User inserted successfully!');
    } else {
      echo $util->showMessage('danger', 'User insertion failed!');
    }
  }

?>
