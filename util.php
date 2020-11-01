<?php

  class Util {
    // Input Field Sanitize
    public function testInput($data) {
      $data = trim($data);  // Remove whitespaces
      $data = stripslashes($data); // Remove Slashes
      $data = htmlspecialchars($data);
      $data = strip_tags($data);

      return $data;
    }

    // Display Success And Error Message
    public function showMessage($type, $message) {
      return '<div class="alert alert-' . $type . ' alert-dismissible fade show" role="alert">
      <strong>' . $message . '</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }  

?>
