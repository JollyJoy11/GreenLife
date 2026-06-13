<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "greenlife";

    //Create database
    $conn =  mysqli_connect($servername, $username, $password);
    $sql = "CREATE DATABASE IF NOT EXISTS greenlife";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    //Create database table
    $table_conn = mysqli_connect($servername, $username, $password, $dbname);
    $table = [
        "CREATE TABLE IF NOT EXISTS user (
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(25) UNIQUE NOT NULL,
            firstname VARCHAR(25) NOT NULL,
            lastname VARCHAR(25) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL, 
            user_password VARCHAR(25) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            trash ENUM('yes','no') DEFAULT 'no',
            trash_date DATETIME)",

        "CREATE TABLE IF NOT EXISTS admin_ (
            admin_username VARCHAR(25) UNIQUE,
            admin_password VARCHAR(25))",

        "CREATE TABLE IF NOT EXISTS feedback (
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            goal ENUM('yes', 'no') DEFAULT 'yes',
            star_rating  VARCHAR(50),
            comment TEXT,
            submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            trash ENUM('yes','no') DEFAULT 'no',
            trash_date DATETIME)",

        "CREATE TABLE IF NOT EXISTS enquiry (
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(25) NOT NULL,
            lastname  VARCHAR(25) NOT NULL,
            email VARCHAR(255) NOT NULL,
            phone VARCHAR(12) NOT NULL,
            street VARCHAR(40) NOT NULL,
            city VARCHAR(20) NOT NULL,
            postcode INT(5) NOT NULL,
            add_state VARCHAR(20) NOT NULL,
            tutorial VARCHAR(20) NOT NULL,
            enquiry TEXT NOT NULL,
            submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            solve ENUM('solved', 'pending') DEFAULT 'pending',
            solve_date DATETIME,
            reply TEXT,
            trash ENUM('yes','no') DEFAULT 'no',
            trash_date DATETIME)",

        "CREATE TABLE IF NOT EXISTS contribute (
            ID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(25),
            FOREIGN KEY (username) REFERENCES user(username) ON DELETE CASCADE ON UPDATE CASCADE,
            plant_name VARCHAR(255) NOT NULL,
            plant_family VARCHAR(255) NOT NULL,
            plant_genus VARCHAR(255) NOT NULL,
            plant_species VARCHAR(255) NOT NULL,
            plant_photo VARCHAR(255) NOT NULL,
            herbarium_photo VARCHAR(255) NOT NULL,
            submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            trash ENUM('yes','no') DEFAULT 'no',
            trash_date DATETIME)",
            
        "CREATE TABLE IF NOT EXISTS otp (
            email VARCHAR(255) NOT NULL PRIMARY KEY,
            otp INT(6) NOT NULL,
            otp_time TIMESTAMP NOT NULL)"
    ];

    for ($i = 0; $i < count($table); $i++){
        mysqli_query($table_conn, $table[$i]);
    }

    //Insert admin username and password into the table
    $admin_sql = "INSERT IGNORE INTO admin_ (admin_username, admin_password) VALUES ('Admin', 'Admin')";
    mysqli_query($table_conn, $admin_sql);
    mysqli_close($table_conn);
?>
