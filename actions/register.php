<?php
include "../classes/User.php";

// Create an object
$user = new User;

// Call the Method
$user->store($_POST);