<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($fname, $lname, $email, $phone) {
      $sql = 'INSERT INTO users (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'phone' => $phone
      ]);
      return true;
    }

    // Select All Users From Database
    public function select() {
      $sql = 'SELECT * FROM users ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Select User by Id
    public function getUserById($id) {
      $sql = 'SELECT * FROM users WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

    // Update Single User
    public function update($id, $fname, $lname, $email, $phone) {
      $sql = 'UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone, updated_at = NOW() WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'fname' => $fname,
        'lname' => $lname,
        'email' => $email,
        'phone' => $phone,
        'id' => $id
      ]);
      return true;
    }

    // Insert Product Details into Database
    public function insertProduct($pname, $pprice, $pimage) {
      $sql = 'INSERT INTO products (pname, pprice, pimage) VALUES (:pname, :pprice, :pimage)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'pname' => $pname,
        'pprice' => $pprice,
        'pimage' => $pimage
      ]);
      return true;
    }

    // Fetch All Products from Database
    public function fetchAllProducts() {
      $sql = 'SELECT * FROM products';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }
  }

?>
