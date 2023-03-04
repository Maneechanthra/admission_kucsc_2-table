<?php
    session_start();
    require('../config.php');
    // print_r( $_REQUEST );

    $sql_query = " SELECT * FROM `education_student` WHERE `National_id` = '".$national_id."' AND `Tcas_round` = ".$tcas_round." ;  ";
    // echo $sql_query;

    $result = $mysqli->query($sql_query);
    $record_number = mysqli_num_rows( $result );
    // print( $record_number );

    unset($_SESSION['app_data']);
    if( $record_number == 1 ){
        // Associative array            
        $personal_data = $result->fetch_assoc();
        //$personal_data = $result->fetch_assoc();
        $_SESSION['National_id'] = $personal_data['National_id'];        
        $_SESSION['Tcas_round'] = $personal_data['Tcas_round'];
        $_SESSION['Firstname_th'] = $personal_data['Firstname_th'];     
        $_SESSION['app_data'] = $personal_data;
    }    
    else{
        $_SESSION['National_id'] = $national_id;
        $_SESSION['Tcas_round'] = $tcas_round;
        $_SESSION['app_data'] = array();
        $_SESSION['Firstname_th'] = $firstname_th;
    }
    
    header("Location: ../views/form1.php");
    


?>
