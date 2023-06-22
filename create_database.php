<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE mydata";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydata";

    // Create connection
    $conn_table = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn_table->connect_error) {
        die("Connection failed: " . $conn_table->connect_error);
    }

    // Create table
    $sql = "CREATE TABLE smoker (
        id VARCHAR(8) PRIMARY KEY NOT NULL,
        gender VARCHAR(15) NOT NULL,
        age VARCHAR(15) NOT NULL,
        height_cm VARCHAR(15) NOT NULL,
        weight_kg VARCHAR(15) NOT NULL,
        waist_cm VARCHAR(15) NOT NULL,
        systolic VARCHAR(15) NOT NULL,
        fasting_blood_sugar VARCHAR(15) NOT NULL,
        Cholesterol VARCHAR(15) NOT NULL,
        triglyceride VARCHAR(15) NOT NULL,
        LDL VARCHAR(15) NOT NULL,
        hemoglobin VARCHAR(15) NOT NULL,
        serum_creatinine VARCHAR(15) NOT NULL,
        AST VARCHAR(15) NOT NULL,
        ALT VARCHAR(15) NOT NULL,
        Gtp VARCHAR(15) NOT NULL,
        oral VARCHAR(15) NOT NULL,
        dental_caries VARCHAR(15) NOT NULL,
        tartar VARCHAR(15) NOT NULL,
        smoking VARCHAR(15) NOT NULL
    )";

    if ($conn_table->query($sql) === TRUE) {
        echo "<br>"."Table 'smoker' created successfully";
    } else {
        echo "<br>"."Error creating table: " . $conn_table->error;
    }

    // Close connection
    $conn_table->close();
} else {
    echo "<br>"."Error creating database: " . $conn->error;
}

// Close connection
$conn->close();
?>
