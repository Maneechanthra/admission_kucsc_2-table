<!DOCTYPE html>
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
  .subsection{
    margin-left: 20px;
  }
</style>
<body>
    
      <div class="container text-center">
      <?php include('navbar.html'); ?>
        <div>
            <div class="py-3 text-center">
            <img style="margin-top: 20px;" class="mb-4" src="../assets/images/KU_Logo.png" alt="" width="80">
            <h3 style="font-size: 40px; margin-top: 20px;">แบบฟอร์มรับสมัคร</h3>
            <h3 style="font-size: 30px">ข้อมูลส่วนตัว</h3>
            </div>
        </div>
        <hr>
        <form action="" method="post">
            <div class="col-lg-12 col-12 row">
            <h4>ข้อมูลภาษาไทย</h4>
              <div class="col-lg-4 col-12 row">
              <label style="margin-right: 10px;">คำนำหน้า : </label>  
              <select class="form-control" id="Prefix_th" name="Prefix_th" style="margin-right: 20px width:40px">
                  <option>กรุณาเลือกคำนำหน้า</option>
                  <option value="นาย">นาย</option>
                  <option value="นาง">นาง</option>
                  <option value="นางสาว">นางสาว</option>
                </select>
              </div>
              <div class="col-lg-4 col-12 row input-group" style="margin-top: 20px">
                <label for="Firstname_th" style="margin-right: 10px;">ชื่อ : </label>
                <input class="form-control" type="text" id="Firstname_th" name="Firstname_th">
              </div>
              <div class="col-ldg-4 col-12 row input-group" style=" padding-left: 40px; margin-top: 20px">
                <label for="Lastname_th" style="margin-right: 10px;">นามสกุล : </label>
                <input class="form-control" type="text" id="Lastname_th" name="Lastname_th">
              </div>
            </div>
        </form>
      </div>
    
</body>
</html>