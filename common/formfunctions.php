<?php
    require_once 'meekrodb.class.php';
    $validationerrors = array();
    
    function showvalidationsummary() {
	global $validationerrors;
	
	if (isset($validationerrors)) {
	    echo '<div class="box red"><ul>';
	    
	    foreach ($validationerrors as $error) {
		echo "<li>$error</li>";
	    }
	    
	    echo '</ul></div>';
	}
    }
    
    function isrequired($parameter, $property) {
	if (empty($_POST[$parameter])) {
	    addvalidationerror("Er is geen $property ingevuld!");
	}
    }
    
    function checkusername($username) {
	DB::query('SELECT * FROM users WHERE username = %s', $username);
	if (DB::count() != 0) {
	    addvalidationerror('Deze gebruikersnaam is reeds geregistreerd!');
	}
    }
    
    function validateEmail($email) {
	if (!filter_var($_POST[$email], FILTER_VALIDATE_EMAIL)) {
	    addvalidationerror('Geen geldig e-mailadres ingevuld!');
	}
    }
    
    function comparepassword ($pass1, $pass2) {
	if ($pass1 != $pass2) {
	    addvalidationerror('De twee ingevulde wachtwoorden komen niet overeen!');
	}
    }
    
    function addvalidationerror($message) {
	global $validationerrors;
	array_push($validationerrors, $message);
    }
    
    function hasvalidationerrors() {
	global $validationerrors;
	return count($validationerrors) > 0;
    }
?>