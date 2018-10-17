<?php
	// Set up connection credentials
	$user = "root";
	$pass = "root";
	$url = "localhost";
    $db = "db_week7";
    
	
	$link = mysqli_connect($url, $user, $pass, $db, "8888"); //Mac
	
	/* check connection */ 	
	if(mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
    }

    //echo "connected";

    // get all car data
    // $myquery = "SELECT * FROM mainmodel";

    // // make the query get the result
    // $result = mysqli_query($link, $myquery);

    // $rows = array();

    // while($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row;
    // }

    if (isset($_GET["carModel"])) { // check for a parameter
        $car = $_GET["carModel"];

        $myquery = "SELECT * FROM mainmodel WHERE model = '$car'";

        $result = mysqli_query($link, $myquery);
        $rows = array();

        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    }

    // send the entire result set as a json encoded array
    echo json_encode($rows);


?>


