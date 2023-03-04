<?php
    session_start();
    require('../config.php');
    print_r( $_POST );

    $selected_religion = $_POST['Religion'];
    if( $selected_religion == -1 ){
        $selected_religion = $_POST['other_religion'];
    }    
    $selected_ethnicity = $_POST['Ethnicity'];
    if( $selected_ethnicity == -1 ){
        $selected_ethnicity = $_POST['other_ethnicity'];
    }    

    $selected_nationality = $_POST['Nationality'];
    if( $selected_nationality == -1 ){
        $selected_nationality = $_POST['other_nationality'];
    }    

    // CHECK existing record
    $sql_query = "SELECT * FROM `applications` WHERE `National_id` = '".$_SESSION['National_id']."' AND `Tcas_round` = '".$_SESSION['Tcas_round']."' ";
    $result = mysqli_query($mysqli,$sql_query);
    $record_number = mysqli_num_rows($result);



    //echo $result;


    $sql_query2 = " SELECT * FROM `education_information` WHERE `App_id` = '".$_SESSION['App_id']."' ; ";
    // echo $sql_query;

    $result2 = $mysqli->query($sql_query2);
    $record_number2 = mysqli_num_rows( $result2 );



    if($record_number == 1 ){
        $update_sql = " UPDATE `applications` SET `Prefix_th` = '".$_POST['Prefix_th']."',
                                        `Firstname_th` = '".$_POST['Firstname_th']."',
                                        `Lastname_th` = '".$_POST['Lastname_th']."',
                                        `Prefix_en` = '".$_POST['Prefix_en']."',
                                        `Firstname_en` = '".$_POST['Firstname_en']."',
                                        `Lastname_en` = '".$_POST['Lastname_en']."',
                                        `Birth_date` =  '".$_POST['Birth_date']."',
                                        `Religion` = '".$selected_religion."', 
                                        `Ethnicity` = '".$selected_ethnicity."', 
                                        `Nationality` = '".$selected_nationality."',
                                        `Telephone_number` = '".$_POST['Telephone_number']."',
                                        `Home_number` = '".$_POST['Home_number']."',
                                        `Email` = '".$_POST['Email']."',
                                        `Parents_occupation` = '".$_POST['Parents_occupation']."',
                                        `Income_parents` = '".$_POST['Income_parents']."'
                                        WHERE App_id = '".$_SESSION['App_id']."'";
        $mysqli->query($update_sql); 

      $update_sql1 = " UPDATE `address` SET `Home_no` = '".$_POST['Home_no']."',
       `Village_no` = '".$_POST['Village_no']."',
        `Street` = '".$_POST['Street']."',
        `Province_id` = '".$_POST['Ref_prov_id']."',
`District_id` = '".$_POST['Ref_dist_id']."',
        `Sub_District_id` = '".$_POST['Ref_subdist_id']."',
        `Postal_Code` =  '".$_POST['Postal_Code']."'
WHERE App_id = '".$_SESSION['App_id']."' ;";
    
        $mysqli->query($update_sql1);

        $personal_data2 = $result2->fetch_assoc();
        $_SESSION['app_data2'] = $personal_data2;
        $_SESSION['National_id'] = $personal_data['National_id'];        
        $_SESSION['edu_qualification'] = $personal_data['edu_qualification'];

    }
else {

        $insert_sql = " INSERT INTO `applications` (`National_id`, `Tcas_round`, `Prefix_th`, `Firstname_th`, `Lastname_th`, `Prefix_en`, `Firstname_en`, `Lastname_en`, `Birth_date`, `Religion`, `Ethnicity`, `Nationality`, `Telephone_number`, `Home_number`, `Email`, `Parents_occupation`, `Income_parents`) 
                        VALUES ('".$_SESSION['National_id']."', '".$_SESSION['Tcas_round']."', '".$_POST['Prefix_th']."', '".$_POST['Firstname_th']."', '".$_POST['Lastname_th']."', '".$_POST['Prefix_en']."', '".$_POST['Firstname_en']."', '".$_POST['Lastname_en']."', '".$_POST['Birth_date']."', '".$selected_religion."', '".$selected_ethnicity."', '".$selected_nationality."', '".$_POST['Telephone_number']."', '".$_POST['Home_number']."', '".$_POST['Email']."', '".$_POST['Parents_occupation']."', '".$_POST['Income_parents']."') ";
        $mysqli->query($insert_sql);

        echo $insert_sql;

        $id = mysqli_insert_id($mysqli);
        
        $insert_sql2 = " INSERT INTO `address`(`App_id`,`Home_no`, `Village_no`, `Street`, `Province_id`, `District_id`, `Sub_District_id`, `Postal_Code`)
                    VALUES('$id','".$_POST['Home_no']."','".$_POST['Village_no']."','".$_POST['Street']."','".$_POST['Ref_prov_id']."','".$_POST['Ref_dist_id']."','".$_POST['Ref_subdist_id']."','".$_POST['Postal_Code']."') ";
        $mysqli->query($insert_sql2);
        echo $insert_sql2;


       
        
        $personal_data2 = $result2->fetch_assoc();
        $_SESSION['app_data2'] = $personal_data2;
        $_SESSION['National_id'] = $personal_data['National_id'];        
        $_SESSION['edu_qualification'] = $personal_data['edu_qualification'];
    } 

   header("Location: ../views/major.php");

?>