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
  <link rel="stylesheet" type="text/css" href="css/maina.css">
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

    <div>
      <button class="button is-success" onclick="eccpt(1, 'القبول')">قبول</button>
      <button class="button is-danger" onclick="eccpt(2, 'الرفض')">رفض</button>
      <button class="button is-dark" onclick="eccpt(0, 'الانتظار')">انتظار</button>
      <div id="status"></div>
    </div>
</div>

        <div class="admin_div" style="margin-top: 30px; background: #fff">


<h3>الاسم الرباعي لرب الاسرة</h3>

<div class="field is-horizontal">
    <div class="field column">
    <label>الاسم الاول</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($rows['name'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error2"></div>
    </div>
    <div class="field column">
    <label>الاسم الثاني</label>
    <input type="text" name="fName" value="<?php echo htmlspecialchars($rows['fName'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error3"></div>
    </div>
    <div class="field column">
    <label>الاسم الثالث</label>
    <input type="text" name="g1Name" value="<?php echo htmlspecialchars($rows['g1Name'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error4"></div>
    </div>
    <div class="field column">
    <label>الاسم الرابع</label>
    <input type="text" name="g2Name" value="<?php echo htmlspecialchars($rows['g2Name'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error5"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
        <label>اسم الام الاول</label>
        <input type="text" name="mName"  value="<?php echo htmlspecialchars($rows['mName'], ENT_QUOTES, 'UTF-8') ?>" readonly />
        <div class="error" id="error6"></div>
    </div>
    <div class="field column">
        <label>اسم الام الثاني</label>
        <input type="text" name="mName1"  value="<?php echo htmlspecialchars($rows['mName1'], ENT_QUOTES, 'UTF-8') ?>" readonly />
        <div class="error" id="error6m1"></div>
    </div>
    <div class="field column">
        <label>اسم الام الثالث</label>
        <input type="text" name="mName2" value="<?php echo htmlspecialchars($rows['mName2'], ENT_QUOTES, 'UTF-8') ?>" readonly />
        <div class="error" id="error6m2"></div>
    </div>
    <div class="field column">
    <label>رقم الهاتف</label>
    <input type="text" name="phone" value="0<?php echo htmlspecialchars($rows['phone'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error7"></div>
    </div>
    <div class="field column">
    <label>التولد</label>
    <input type="text" name="bdday" value="<?php echo htmlspecialchars($rows['bdday'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdmonth" value="<?php echo htmlspecialchars($rows['bdmonth'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="bdyear" value="<?php echo htmlspecialchars($rows['bdyear'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    </div>
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

<div class="field is-horizontal">
    <div class="field column">
    <label>رقم البطاقة الوطنية</label>
    <input type="text" name="idNum" value="<?php echo htmlspecialchars($rows['idNum'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error8"></div>
    </div>
    <div class="field column">
    <label>هوية الأحوال المدنية</label>
    <input type="text" name="id2Num" value="<?php echo htmlspecialchars($rows['id2Num'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error9"></div>
    </div>
    <div class="field column">
    <label>رقم السجل</label>
    <input type="text" name="id2Numsec" value="<?php echo htmlspecialchars($rows['id2Numsec'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error9sec"></div>
    </div>
    <div class="field column">
    <label>رقم الصحيفة</label>
    <input type="text" name="id2Numsec2" value="<?php echo htmlspecialchars($rows['id2Numsec2'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error9sec2"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>رقم البطاقة التموينية</label>
    <input type="text" name="tmNum" value="<?php echo htmlspecialchars($rows['tmNum'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error10"></div>
    </div>
    <div class="field column">
    <label>اسم المركز</label>
    <input type="text" name="mrkzName" value="<?php echo htmlspecialchars($rows['mrkzName'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error11"></div>
    </div>
    <div class="field column">
    <label>رقم المركز التمويني</label>
    <input type="text" name="mrkzNum" value="<?php echo htmlspecialchars($rows['mrkzNum'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error12"></div>
    </div>
</div>


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
    <label>نوع السكن</label>
      <?php
      $liv = array('', 'ملك', 'ايجار', 'عشوائيات');
      ?>
    <input type="text" name="liv" value="<?php echo $liv[$rows['liv']] ?>" readonly />
    <div class="error" id="errorliv"></div>
    </div>
    <div class="field column">
    <label>محلة</label>
    <input type="text" name="add3Num" value="<?php echo htmlspecialchars($rows['add3Num'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error133"></div>
    </div>
    <div class="field column">
    <label>زقاق</label>
    <input type="text" name="addNum" value="<?php echo htmlspecialchars($rows['addNum'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error13"></div>
    </div>
    <div class="field column">
    <label>دار</label>
    <input type="text" name="add2Num" value="<?php echo htmlspecialchars($rows['add2Num'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error14"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
    <label>اسم المختار</label>
    <input type="text" name="addName" value="<?php echo htmlspecialchars($rows['addName'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error15"></div>
    </div>
    <div class="field column">
    <label>رقم هاتف المختار</label>
    <input type="text" name="addPhone" value="<?php echo htmlspecialchars($rows['addPhone'], ENT_QUOTES, 'UTF-8') ?>" readonly />
    <div class="error" id="error16"></div>
    </div>
</div>


<div id="members"></div>


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
        pdf.save("Form.pdf");
      document.getElementById('btns').style.display = 'flex';
    });
}

function setMembers() {
    var members = <?php echo $rows['members'] ?>;
    var memdata = <?php echo $rows['memdata'] ?>;
    var memdataJson = memdata;
    var jobs = ['', 'طالب', 'موظفي حكومي', 'كاسب', 'اخرى'];
    var studys = ['', 'دراسة جامعية', 'معهد او اعدادية', 'متوسطة', 'ابتدائية'];
    var genders = ['', 'ذكر', 'انثى'];
    var elm = document.getElementById("members");
    var inhtml = '';

    var days = '';
    for (var i = 1; i < 32; i++) {
        days += '<option value="'+i+'">'+i+'</option>';
    }
    var months = '';
    for (var i = 1; i < 13; i++) {
        months += '<option value="'+i+'">'+i+'</option>';
    }
    var years = '';
    for (var i = 1930; i < 2021; i++) {
        years += '<option value="'+i+'">'+i+'</option>';
    }

    for (var i = 1; i <= members; i++) {
        inhtml += `
<article class="panel is-info" style="background: #fff; height: 100%">
  <p class="panel-heading">
      الفرد رقم ${i}  
  </p>
<h2 style="margin-top: 20px">الاسم الرباعي حسب البطاقة التموينية</h2>
<div class="field is-horizontal">
    <div class="field column">
        <label>الاسم</label>
        <input type="text" name="mname${i}" value="${memdataJson[i-1].mname}" readonly />
        <div class="error" id="error1l${i}"></div>
    </div>
    <div class="field column">
        <label>اسم الاب</label>
        <input type="text" name="mfName${i}" value="${memdataJson[i-1].mfName}" readonly />
        <div class="error" id="error2l${i}"></div>
    </div>
    <div class="field column">
        <label>اسم الجد الاول</label>
        <input type="text" name="mg1Name${i}" value="${memdataJson[i-1].mg1Name}" readonly />
        <div class="error" id="error3l${i}"></div>
    </div>
    <div class="field column">
        <label>اسم الجد الثاني</label>
        <input type="text" name="mg2Name${i}" value="${memdataJson[i-1].mg2Name}" readonly />
        <div class="error" id="error4l${i}"></div>
    </div>
</div>

<div class="field is-horizontal">
    <div class="field column">
        <label>الجنس</label>
        <input type="text" name="mgender" value="${genders[memdataJson[i-1].mgender]}" readonly />
    </div>
    <div class="field column">
    <label>التولد</label>
    <input type="text" name="mbdday" value="${memdataJson[i-1].mbdday}" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="mbdmonth" value="${memdataJson[i-1].mbdmonth}" readonly />
    </div>
    <div class="field column">
    <label style="opacity: 0;">.</label>
    <input type="text" name="mbdyear" value="${memdataJson[i-1].mbdyear}" readonly />
    </div>

    <div class="field column">
    <label>المهنة</label>
    <input type="text" name="mjob" value="${jobs[memdataJson[i-1].mjob]}" readonly />
    <div class="error" id="errorjob"></div>
    </div>

    <div class="field column">
    <label>التحصيل الدارسي</label>
    <input type="text" name="mstudy" value="${studys[memdataJson[i-1].mstudy]}" readonly />
    <div class="error" id="errorstudy"></div>
    </div>

</div>
</article>

        `;
    }

    elm.innerHTML = inhtml;
}
setMembers();

var stElm = document.getElementById("status");
var status = <?php echo $rows['status'] ?>;

function getEcc(type) {
    if(type == 0){
        stElm.innerHTML = 'في الانتظار';
        stElm.style.backgroundColor = '#2f2f2f';
    }
    if(type == 1){
        stElm.innerHTML = 'تم القبول';
        stElm.style.backgroundColor = '#3ec46d';
    }
    if(type == 2){
        stElm.innerHTML = 'لم يتم القبول';
        stElm.style.backgroundColor = '#f03a5f';
    }
}
getEcc(status);

function eccpt(type, msg) {
    var conf = confirm("تأكيد "+msg+"؟");
    if(conf == true){
        fetch('php/action.php', {
            method: 'post',
            headers: {
              "Content-type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            credentials: 'same-origin',
            body: 'type='+type+'&id=<?php echo $id; ?>'
        })
        .then((res) => res.text())
        .then((resText) => {
            if(resText != 'error'){
                getEcc(resText);
            }else{
                alert("حدث خطأ 2");
            }
        })
        .catch((err) => {
            alert("حدث خطأ 1");
        })
    }
}
</script>
</body>
</html>