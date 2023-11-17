<?php
$conn = require_once(__DIR__."/connect.db.php");

function addUser($name, $email, $dob, $country,$password = "admin") {
    global $conn;
    // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (full_name, email, date_of_birth, country,password) VALUES (:name, :email, :dob, :country,:password)";
    $statement = $conn->prepare($sql);
    $result = $statement->execute([
                                    ':name' => $name,
                                    ':email' => $email,
                                    ':dob' => $dob,
                                    ':country' => $country,
                                    ':password' => $password
                                  ]);
    // $result->lastInsertId();
}

function updateUser($name, $email, $country, $id) {
    global $conn;
    $sql = "UPDATE users SET full_name = :name , email = :email, country = :country WHERE user_id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":name",$name);
    $statement->bindParam(":email",$email);
    // $statement->bindParam(":dob",$dob);
    $statement->bindParam(":country",$country);
    $statement->bindParam(":id",$id);
    $statement->execute();
}

function deleteUser($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE user_id = :id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(":id",$id);
    $statement->execute();
}

function getUsers() {
    global $conn;
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    return $result->fetchAll(PDO::FETCH_ASSOC);
}
