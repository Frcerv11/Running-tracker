<?php
    session_start();
    include('includes/db.php');

    $sql = "SELECT * FROM log";

    $result = mysqli_query($db, $sql) or die("Error in Selecting " . mysqli_error($db));
    //create an array
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray2[] = $row;
    }
    echo json_encode($emparray2);


?>
