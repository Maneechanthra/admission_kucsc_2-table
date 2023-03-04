<?php


require('../fpdf185/fpdf.php');
require('../config.php');


$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->AddFont('sarabun','','THSarabun.php');
$pdf->AddFont('sarabunB','','THSarabun Bold.php');

//$pdf ->Image('../assets/images/KU_Symbol_Eng.png',92,10,30);

$App_id = $_GET['App_id'];
$Major_id = $_GET['Major_id'];

$pdf->setFont('sarabunB','','18');

    $sql = "SELECT * FROM `applications` WHERE `App_id` = $App_id;";
    $query = mysqli_query($mysqli,$sql);
    $row_p = mysqli_fetch_assoc($query);


    $sql = "SELECT * FROM `address` WHERE `App_id` = $App_id;";
    $query = mysqli_query($mysqli,$sql);
    $row_a = mysqli_fetch_assoc($query);
    $province_row = $row_a["Province_id"];

    $sql_pro = "SELECT * FROM `provinces` WHERE id = $province_row;";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    $row_pro = mysqli_fetch_assoc($query_pro);




$pdf->Cell(0,9,iconv('utf-8','cp874','ใบรับสมัคร'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','การคัดเลือกเข้าศึกษาต่อในมหาวิทยาลัยเกษตรศาสตร์'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','วิทยาเขตเฉลิมพรเกียรติ จังหวัดสกลนคร'),0,1,'C');
$pdf->Cell(0,9,iconv('utf-8','cp874','ประจำปีการศึกษา 2566 รอบที่ '.$row_p['Tcas_round']),0,1,'C');
$pdf->Ln();

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874','รหัสบัตรประจำตัวประชาชน : '.$row_p ['National_id'].'                ชื่อ - นามสกุล : '.$row_p ['Firstname_th'].'  '.$row_p['Lastname_th']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','วัน เดือน ปีเกิด : '.$row_p ['Birth_date'].'            สัญชาติ : '.$row_p ['Ethnicity'].'       เชื้อชาติ : '.$row_p['Nationality'].'        ศาสนา : '.$row_p['Religion']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','บ้านเลขที่  : '.$row_a ['Home_no'].'  หมูjที่ : '.$row_a ['Village_no'].'  ตำบล : '.$row_a['Sub_district'].'  อำเภอ : '.$row_a['District'].'  จังหวัด : '.$row_pro['name_th'].' '.$row_a ['Postal_Code']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874',' โทรศัพท์บ้าน '.$row_p ['Home_number'].'   โทรศัพท์มือถือ : '.$row_p ['Telephone_number'].' Email : '.$row_p['Email']),0,1);

$sql = "SELECT * FROM `education_student` WHERE Major_id = '$Major_id' ";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);

$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,10,iconv('utf-8','cp874','ข้อมูลการศึกษา'),0,1);

$sql = "SELECT * FROM `education_student` WHERE Major_id = '$Major_id'";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);
$major_id = $row["Major_id"];

$sqli = "SELECT * FROM `major` WHERE Major_id = '$Major_id'";
$queryi = mysqli_query($mysqli,$sqli);
$rowi = mysqli_fetch_assoc($queryi);
$facuty_id = $rowi["Facuty_id"];

$sqlp = "SELECT * FROM `facuty` WHERE Facuty_id = $facuty_id";
$queryp = mysqli_query($mysqli,$sqlp);
$rowp = mysqli_fetch_assoc($queryp);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874','ผลการเรียนเฉลี่ยสะสม : '.$row ['edu_qualification'].' ('.$row ['stady_plan'].')  รวมเป็น '.$row ['gpax']),0,1);
$pdf->Cell(0,8,iconv('utf-8','cp874','ชื่อโรงเรียน : '.$row ['School_name']),0,1);

$pdf->setFont('sarabunB','','18');
$pdf->Cell(0,9,iconv('utf-8','cp874','สมัครเข้าศึกษา  : '.$rowp ['Facuty_name']),0,1);
$pdf->Cell(0,9,iconv('utf-8','cp874','หลักสูตร   : '.$rowi ['Major_name']),0,1);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,7,iconv('utf-8','cp874','             ข้าพเจ้าขอรับรองว่ามีคุณสมบัติครบตามประกาศรับสมัครของมหาวิทยาลัยเกษตรศาสตร์ วิทยาเขตเฉลิมพระเกียรติ  '),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','จังหวัดสกลนคร ทุกประการ หากตรตรวจสอบในภายหลังพบว่าขาดคุณสมบัติ ข้าพเจ้ายินดีให้มหาวิทยาลัยตัดสิทธิ์ในการเข้าศึกษา'),0,1);
$pdf->Cell(0,7,iconv('utf-8','cp874','โดยไม่มีข้ออุทธรณ์ใดๆ ทั้งสิ้น'),0,1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$sql = "SELECT * FROM `applications`";
$query = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_assoc($query);

$pdf->setFont('sarabun','','16');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ลงชื่อ '.$row ['Firstname_th'].'  '.$row['Lastname_th'].' ผู้สมัคร '),0,1,'R');
$pdf->Cell(0,8,iconv('utf-8','cp874',' ( '.$row ['Firstname_th'].'  '.$row['Lastname_th'].' ) '),0,1,'R');

$pdf->Output();


?>