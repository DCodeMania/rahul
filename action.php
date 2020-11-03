<?php

  require_once 'db.php';
  require_once 'util.php';

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

  // Handle Fetch All Users Ajax Request
  if (isset($_POST['fetch_all_users'])) {
    $user = $db->select();
    $output = '';
    if ($user) {
      foreach ($user as $row) {
        $output .= '
            <tr>
              <td>' . $row['id'] . '</td>
              <td>' . $row['first_name'] . '</td>
              <td>' . $row['last_name'] . '</td>
              <td>' . $row['email'] . '</td>
              <td>' . $row['phone'] . '</td>
              <td>
                <a href="#" id="' . $row['id'] . '" class="text-primary" title="View Details"><i class="fas fa-info-circle fa-lg fa-fw"></i></a>

                <a href="#" id="' . $row['id'] . '" class="text-success editBtn" title="Edit" data-toggle="modal" data-target="#editUserModal"><i class="fas fa-edit fa-lg fa-fw"></i></a>

                <a href="#" id="' . $row['id'] . '" class="text-danger" title="Delete"><i class="fas fa-trash fa-lg fa-fw"></i></a>
              </td>
            </tr>    
        ';
      }
      echo $output;
    } else {
      echo '<tr>
              <td colspan="6">No users found in the database!</td>
            </tr>';
    }
  }

  // Handle Edit Ajax Request
  if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];

    echo json_encode($db->getUserById($id));
  }

  // Handle Update Ajax Request
  if (isset($_POST['update_user'])) {
    $id = $util->testInput($_POST['id']);
    $fname = $util->testInput($_POST['fname']);
    $lname = $util->testInput($_POST['lname']);
    $email = $util->testInput($_POST['email']);
    $phone = $util->testInput($_POST['phone']);

    if ($db->update($id, $fname, $lname, $email, $phone)) {
      echo $util->showMessage('success', 'User updated successfully!');
    } else {
      echo $util->showMessage('danger', 'Something went wrong!');
    }
  }

  // Handle Image Upload Ajax Request
  if (isset($_POST['upload'])) {
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    $allowed_ext = ['jpg', 'png', 'gif'];
    $tmp_ext = explode('.', $file_name);
    $ext = strtolower(end($tmp_ext));

    $upload_dir = 'upload/';
    $upload_file_name = uniqid() . '.' . $ext;
    $destination = $upload_dir . $upload_file_name;

    if (!file_exists($destination)) {
      if (!$error) {
        if (in_array($ext, $allowed_ext)) {
          if ($file_size <= 1000000) {
            move_uploaded_file($file_tmp, $destination);
            echo $util->showMessage('success', 'Image Uploaded Successfully!');
          } else {
            echo $util->showMessage('danger', 'Image size should be less or equal to 1 MB!');
          }
        } else {
          echo $util->showMessage('info', 'This file type is not allowed to upload!');
        }
      } else {
        echo $util->showMessage('danger', 'Something went wrong!');
      }
    } else {
      echo $util->showMessage('danger', 'Image already exist in the database!');
    }
  }

?>
