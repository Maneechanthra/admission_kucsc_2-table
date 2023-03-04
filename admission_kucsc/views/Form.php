
<?php
      $con= mysqli_connect("localhost","root","oof123456","admission_kucsc") or die("Error: " . mysqli_error($con));
      mysqli_query($con, "SET NAMES 'utf8' ");
      error_reporting( error_reporting());
      date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>select by.devtai.com</title>
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
        .app_subsection{
            padding-top:20px; 
            color:red; 
            font-weight:800; 
            font-size:120%;
        }
    </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
    $sql_provinces = "SELECT * FROM `provinces` ";
    $query = mysqli_query($con, $sql_provinces);
?>
       
    <div class="col-lg-3 form-group">
  

      <label for="sel1">จังหวัด:</label>
      <select select class="form-control form-control-lg" name="Ref_prov_id" id="provinces">
            <option value="" selected disabled>-กรุณาเลือกจังหวัด-</option>
             <?php foreach ($query as $value) { ?>
            <option value="<?=$value['id']?>"><?=$value['name_th']?></option>
            <?php } ?>
      </select>
      <br>
      </div>

      <div style="width: 200px;" class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="amphures">อำเภอ : </label> 
          <select class="form-control form-control-lg" name="Ref_dist_id" id="amphures">
      </select>
      </div>
      
      <div class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="districts">ตำบล : </label> 
          <select class="form-control form-control-lg" name="Ref_subdist_id" id="districts"></select> 
      </div>


       <div class="col-lg-3 form-group">
          <label style="padding-right: 10px;" for="Postal_Code">รหัสไปรษณีย์ : </label> 
          <input type="text" name="Postal_Code" id="Postal_Code" class="form-control"> 
      </div>
</body>
</html>
<?php include('script.php');?>
