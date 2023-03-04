<?php
    session_start();
    require('../config.php');
    print_r( $_SESSION['app_data2'] );
?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>ข้อมูลส่วนตัว</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../assets/css/form-validation.css" rel="stylesheet">
  </head>
    <style>

@import url('https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@500&family=Sarabun:wght@300&display=swap');
            *{font-family: 'Sarabun', sans-serif;}

        .app_subsection{
            padding-top:20px; 
            color:red; 
            font-weight:800; 
            font-size:120%;
        }
    </style>

  <body class="container bg-light">
        
        <div class="container"></div>
        <?php include('navbar.html') ?>
        </div>
        


       
    <!------------------------------------------------------- ข้อมูลหลักสูตร ------------------------------------------------------->      


     
    <div class="container">
      <div class="py-5 text-center">
        <img style="width: 20%;" class="mb-4" src="../assets/images/KU_Logo.png" alt="" width="100">
        <h2>เลือกหลักสูตร</h2>
        <p class="lead"><?php echo isset($_SESSION['National_id']) ? "ผู้สมัคร : ".$_SESSION['Firstname_th'] : "ผู้สมัครใหม่".$_SESSION['National_id'];  ?></p>
      </div>
        <hr>

      <!------------------------------------------------------------------------------------------------>
        
      
      <form class="card-form" action="../functions/major_function.php" method="POST">
      <div>
                        <p style="font-weight: bold;" class="lead"><?php echo isset($_SESSION['National_id']) ? "รหัสประจำตัวประชาชน หรือ Passport : ".$_SESSION['National_id'] : "ผู้สมัครใหม่";  ?></p>
            </div>

      <!------------------------------------------------------- ข้อมูลหลักสูตร ------------------------------------------------------->  
      
      
     <div class="app_subsection">
                ข้อมูลการศึกษา
            </div>
            <div class="col-lg-12 col-12 row">                    
                <div style="margin-top: 10px;" class="col-lg-3 col-12">
                    ข้อมูลการเรียน :
                </div>
                <div style="margin-top: 10px;"  class="col-lg-9 col-12">
                    <div class="col-lg-12 col-12 form-group form-inlines">                
                        <div class="col-12 input-group">


                        <?php
                          $sql_provinces = "SELECT * FROM `provinces` ";
                          $query = mysqli_query($mysqli, $sql_provinces);
                            ?>

                  <?php
                        $school_name_value = "";
                        if( isset( $_SESSION['app_data2']['School_name'] ) ){
                            $school_name_value = $_SESSION['app_data2']['School_name'] ; 
                        }                    
                    ?>   

                            <label style="padding-right: 10px; " for="School_name">โรงเรียน/สถานศึกษา : </label> 
                            <select style="font-size: 14px; text-align: center;" select class="form-control form-control-lg" name="Ref_prov_id" id="provinces">
                                <option value="<?php echo $province_result ?>" selected disabled>-กรุณาเลือกจังหวัด-</option>
                                <?php foreach ($query as $value) { ?>
                                <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
                                <?php } ?>
                            </select>
                            <input style="margin-left : 10px; font-size: 14px; text-align: center;" type="text" class="form-control" id="School_name" name="School_name" placeholder="กรุณากรอกชื่อโรงเรียน" value="<?php echo $school_name_value ?>"> 
                        </div>

                        <?php
                        $edu_qualification_value = "";
                        if( isset( $_SESSION['app_data2']['edu_qualification'] ) ){
                            $edu_qualification_value = $_SESSION['app_data2']['edu_qualification'] ; 
                        }                    
                    ?>  
 
                        <div style="margin-top: 10px;" class="col-lg-12 col-12 input-group">                
                            <label for="edu_qualification">วุฒิการศึกษา : </label><br>
                                <select class="btn btn-outline-primary btn-sm" style="margin-left : 10px; width: 230px" name="edu_qualification" id="edu_qualification" value="">
                                <option selected disabled><?php echo $edu_qualification_value ?></option>
                               <!-- <option value="<?php echo $edu_qualification_value ?>" selected disabled> - -กรุณาเลือกหลักสูตร-- </option>  -->
                                <option value="ม.6">ม.6</option>      
                                <option value="ปวช.">ปวช.</option>                          
                                </select>
                                
                        </div>

                    <?php
                        $stady_plan_value = "";
                        if( isset( $_SESSION['app_data2']['stady_plan'] ) ){
                            $stady_plan_value = $_SESSION['app_data2']['stady_plan'] ; 
                        }                    
                    ?> 
                        <div style="margin-top: 10px;" class="col-lg-12 col-12 input-group">                
                            <label for="stady_plan">แผนการเรียน : </label><br>
                                <select class="btn btn-outline-primary btn-sm" style="margin-left : 10px;" name="stady_plan" id="stady_plan">
                                <option value="<?php echo $stady_plan_value;?>" selected disabled>-กรุณาเลือกแผนการเรียน-</option> 
                                    <option value="วิทย์-คณิต">วิทย์-คณิต</option>
                                    <option value="ศิลป์-คำนวณ">ศิลป์-คำนวณ</option>    
                                    <option value="อาชีวศึกษา">อาชีวศึกษา</option>  
                                    <option value="-1">อื่นๆ</option>                        
                                </select>
                                <input type="text" name="other_stady_plan" id="other_stady_plan" style="display:none; width: 150px; margin-left: 15px" placeholder="กรุณาระบุอื่นๆ ">
                        </div>
                        <div style="margin-top: 10px; width: 1000px;" class="col-12 input-group">
                            <label style="padding-right: 10px;" for="gpax">เกรดเฉลี่ยสะสม : </label> 
                            <input type="text" class="form-control" id="gpax" name="gpax" placeholder="" required> 
                        </div>
                       <!-- <div style="margin-top: 10px; width: 1000px;" class="col-12 input-group">
                            <label style="padding-right: 10px;" for="gpax">ใบแสดงผลการเรียน : </label> 
                            <input type="file" class="form-control" id="tran_sc" name="tran_sc" placeholder="" required> 
                        </div>
                      -->
                    </div>
                </div>
            </div>
      
    <!----------------------------------------------------------------------------------------------------------------------------------------------------->

        <div>
            <div class="app_subsection">
                เลือกหลักสูตรที่ต้องการสมัคร : 
            </div>      
            <div class="col-lg-12 col-12 row">                    
                <div style="margin-top: 10px;" class="col-lg-3 col-12">
                    ข้อมูลหลักสูตรการศึกษา :
                </div>
                <div style="margin-top: 10px;"  class="col-lg-9 col-12">
                    <div class="col-lg-12 col-12 form-group form-inlines">                
                        
            <?php                                  
  $sql_major = "SELECT * FROM major";
  $query_major = mysqli_query($mysqli, $sql_major);
            ?>


                  <div style="margin-top: 10px;" class="col-lg-12 col-12 input-group">         
                            <label style="margin-top: 20px;" for="major_1">หลักสูตรการศึกษา : </label><br>
                            <select name="major" id="major" class="btn btn-outline-primary btn-sm" style=" text-align: left; margin-left : 10px; margin-top: 20px" >
                            <option value="" selected disabled>-กรุณาเลือกหลักสูตร-</option> 
                            
                            <?php 

                        for($i=0;$i<=22;$i++){

                          $f = mysqli_fetch_assoc( $query_major);
                  
                              if($f) {
                                  echo "<option value='".$f['Major_id']."'>".$f['Major_name']." (".$f['Major_id'].")"."</option>";
                            } else {
                              mysqli_data_seek($result, 0);
                              $f = mysqli_fetch_assoc( $query_major);
                              echo "<option value='".$f['Major_id']."'>".$f['Major_name']." (".$f['Major_id'].")"."</option>";
                            }
                        }
                            ?>
                            

                            </select>
                        </div>


                        

      

                        
                    </div>
                </div>
            </div>
          </div>
            <hr>
            <!--------------------------------------------------------------------------------------------------------------------------->

            <div style="padding-top:18px;">
            <button class="btn btn-primary btn-block" type="submit">บันทึก</button>
        </div>
        </div>

    </form>

        <?php
            for($i=0;$i<20;$i++){
                echo "<br>";
            }
        ?>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>


    <link rel="stylesheet" href="../assets/jquery-ui/jquery-ui.css">
    
    <script src="../assets/jquery-ui/jquery.js"></script>
    <script src="../assets/jquery-ui/jquery-ui.js"></script>
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {



        'use strict';

        // $("#app_birthday" ).datepicker();
        $("#Birth_date" ).datepicker({ dateFormat: 'yy-mm-dd' });

        $("#stady_plan").change(function(){
            console.log( $(this).val() );
            if( $(this).val() == -1 ){
                $("#other_stady_plan").show();
                $("#other_stady_plan").focus();
            } else {
              $("#other_stady_plan").hide();
            }

        });

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
  </body>
</html>
