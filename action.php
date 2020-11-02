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

?>
