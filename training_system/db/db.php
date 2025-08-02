<?php

$conn = mysqli_connect("localhost", "root", "", "training_system", "3307");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}