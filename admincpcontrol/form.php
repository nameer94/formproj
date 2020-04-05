<?php
include '../php/dbconnect.php';
session_start();

if (!isset($_SESSION['admin'])) {
  header("Location:index.php");
}

$id = $conn->real_escape_string($_GET['id']);

$form_qry = $conn->query("SELECT * FROM forms WHERE id='$id'");
$rows = $form_qry->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <title>لوحة التحكم</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../css/bulma.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body id="pdfcon">

  <div class="header">اﻟﺎﺳﺘﻤﺎرة اﻟﺎﻟﻜﺘﺮوﻧﻴﺔ</div>
  <img src="../css/logo.png" />


<section class="section">
  <div class="container">
    <div class="columns">

      <div class="column is-12">

<div class="submit_div" id="btns">
  <button onclick="CreatePDFfromHTML()" style="font-weight: bold; font-size: 12pt">حفظ كملف PDF</button>
</div>

        <div class="admin_div" style="margin-top: 30px; background: #fff">


<h3>الاسم الرباعي لرب الاسرة</h3>

<div class="field is-horizontal">
    <div class="field column">
    <label>الاسم</label>
    <input type="text" name="name" value="<?php echo $rows['name'] ?>" readonly />
    <div class="error" id="error2"></div>
    </div>
    <div class="field column">
    <label>اسم الاب</label>
    <input type="text" name="fName" value="<?php echo $rows['fName'] ?>" readonly />
    <div class="error" id="error3"></div>
    </div>
    <div class="field column">
    <label>اسم الجد الاول</label>
    <input type="text" name="g1Name" value="<?php echo $rows['g1Name'] ?>" readonly />
    <div class="error" id="error4"></div>
    </div>
    <div class="field column">
    <label>اسم الجد الثاني</label>
    <input type="text" name="g2Name" value="<?php echo $rows['g2Name'] ?>" readonly />
    <div class="error" id="error5"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>اسم الام</label>
    <input type="text" name="mName" value="<?php echo $rows['mName'] ?>" readonly />
    <div class="error" id="error6"></div>
    </div>
    <div class="field column">
    <label>رقم الهاتف</label>
    <input type="text" name="phone" value="<?php echo $rows['phone'] ?>" readonly />
    <div class="error" id="error7"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>رقم البطاقة الوطنية</label>
    <input type="text" name="idNum" value="<?php echo $rows['idNum'] ?>" readonly />
    <div class="error" id="error8"></div>
    </div>
    <div class="field column">
    <label>هوية الأحوال المدنية</label>
    <input type="text" name="id2Num" value="<?php echo $rows['id2Num'] ?>" readonly />
    <div class="error" id="error9"></div>
    </div>
    <div class="field column">
    <label>رقم البطاقة التموينية</label>
    <input type="text" name="tmNum" value="<?php echo $rows['tmNum'] ?>" readonly />
    <div class="error" id="error10"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>اسم المركز</label>
    <input type="text" name="mrkzName" value="<?php echo $rows['mrkzName'] ?>" readonly />
    <div class="error" id="error11"></div>
    </div>
    <div class="field column">
    <label>رقم المركز التمويني</label>
    <input type="text" name="mrkzNum" value="<?php echo $rows['mrkzNum'] ?>" readonly />
    <div class="error" id="error12"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>التولد</label>
    <input type="text" name="bdday" value="<?php echo $rows['bdday'] ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdmonth" value="<?php echo $rows['bdmonth'] ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdyear" value="<?php echo $rows['bdyear'] ?>" readonly />
    </div>
</div>
<div class="error" id="errorbd"></div>

<div class="field is-horizontal">
    <div class="field column">
    <label>المحافظة</label>
      <?php
      $moh = array('', 'بغداد', 'اربيل', 'الانبار', 'بابل', 'دهوك', 'كربلاء', 'البصره', 'السليمانية', 'واسط', 'نينوى', 'كركوك', 'النجف', 'ديالى', 'صلاح الدين', 'ميسان', 'الديوانية', 'المثنى', 'ذي قار');
      ?>
    <input type="text" name="moh" value="<?php echo $moh[$rows['moh']] ?>" readonly />
    <div class="error" id="errormoh"></div>
    </div>
    <div class="field column">
    <label>زقاق</label>
    <input type="text" name="addNum" value="<?php echo $rows['addNum'] ?>" readonly />
    <div class="error" id="error13"></div>
    </div>
    <div class="field column">
    <label>دار</label>
    <input type="text" name="add2Num" value="<?php echo $rows['add2Num'] ?>" readonly />
    <div class="error" id="error14"></div>
    </div>
    <div class="field column">
    <label>نوع السكن</label>
      <?php
      $liv = array('', 'ملك', 'ايجار', 'عشوائيات');
      ?>
    <input type="text" name="liv" value="<?php echo $liv[$rows['liv']] ?>" readonly />
    <div class="error" id="errorliv"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>اسم المختار</label>
    <input type="text" name="addName" value="<?php echo $rows['addName'] ?>" readonly />
    <div class="error" id="error15"></div>
    </div>
    <div class="field column">
    <label>رقم هاتفه</label>
    <input type="text" name="addPhone" value="<?php echo $rows['addPhone'] ?>" readonly />
    <div class="error" id="error16"></div>
    </div>
</div>

<h3>استمارة افراد العائلة</h3>
<h2>الاسم الرباعي</h2>

<div class="field is-horizontal">
    <div class="field column">
    <label>الاسم</label>
    <input type="text" name="name1" value="<?php echo $rows['name1'] ?>" readonly />
    <div class="error" id="error17"></div>
    </div>
    <div class="field column">
    <label>اسم الاب</label>
    <input type="text" name="fName1" value="<?php echo $rows['fName1'] ?>" readonly />
    <div class="error" id="error18"></div>
    </div>
    <div class="field column">
    <label>اسم الجد الاول</label>
    <input type="text" name="g1Name1" value="<?php echo $rows['g1Name1'] ?>" readonly />
    <div class="error" id="error19"></div>
    </div>
    <div class="field column">
    <label>اسم الجد الثاني</label>
    <input type="text" name="g2Name1" value="<?php echo $rows['g2Name1'] ?>" readonly />
    <div class="error" id="error20"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>التولد</label>
    <input type="text" name="bdday1" value="<?php echo $rows['bdday1'] ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdmonth1" value="<?php echo $rows['bdmonth1'] ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdyear1" value="<?php echo $rows['bdyear1'] ?>" readonly />
    </div>
</div>
<div class="error" id="errorbd1"></div>

<div class="field is-horizontal">
    <div class="field column">
    <label>المهنة</label>
      <?php
      $job = array('', 'طالب', 'موظفي حكومي', 'كاسب', 'اخرى');
      ?>
    <input type="text" name="job" value="<?php echo $job[$rows['job']] ?>" readonly />
    <div class="error" id="errorjob"></div>
    </div>
    <div class="field column">
    <label>التحصيل الدارسي</label>
      <?php
      $study = array('', 'دراسة جامعية', 'معهد او اعدادية', 'متوسطة', 'ابتدائية');
      ?>
    <input type="text" name="study" value="<?php echo $study[$rows['study']] ?>" readonly />
    <div class="error" id="errorstudy"></div>
    </div>
</div>


      </div>
      </div>

    </div>
  </div>
</section>

<script type="text/javascript" src="assets/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
function CreatePDFfromHTML() {
    document.getElementById('btns').style.display = 'none';
    var HTML_Width = $("#pdfcon").width();
    var HTML_Height = $("#pdfcon").height();
    var top_left_margin = 15;
    var PDF_Width = HTML_Width + (top_left_margin * 2);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($("#pdfcon")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
      document.getElementById('btns').style.display = 'block';
    });
}
</script>
</body>
</html>