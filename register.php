<?php
    header('Content-Type: text/html; charset=utf-8');
    date_default_timezone_set('Asia/Bangkok');
    include "./lib/dbConnector.php";
    include "./model/province.php";
    $obj = new Province();
    $rows_province = $obj->read();
?>
<!doctype>
<html>
    <head>
        <title>ระบบบริการแท๊กซี่</title>
        <meta charset="utf-8" />
        <link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>          
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
                background: url('images/bg0004.jpg') no-repeat center center fixed;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
   <script type="text/javascript">
    // When the document is ready
	$(document).ready(function () {		
		$('#birthday').datepicker({
			format: "yyyy-mm-dd"
		});  
	});
        function formatPhone(obj) {
            var numbers = obj.value.replace(/\D/g, ''),
                 char = {};
            //char = {0:'(',3:') ',6:' - '};
            obj.value = '';
            for (var i = 0; i < numbers.length; i++) {
                obj.value += (char[i]||'') + numbers[i];
            }
        } 
        function CheckMobileNumber() {
           var data = $("#mobile").val();
           var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
           s = new String(data);
           if ( s.length != 10)
           {
              alert(msg);
              return false;
           }else{
                return true;
           }
        }
    </script>
    </head>
    <body>
    <h3 class="text-center">สมัครสมาชิก</h3>
    <br/><br /> 
<div class="container">
    <form action="doAddMember.php" method="post" class="form form-horizontal">
        <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
            <div class="row">
                <div class="col-md-3">
                    <label>Username</label>
                    <input type="text" name="username" value="" class="form-control" required="" />
                </div>
                <div class="col-md-3">
                    <label>Password</label>
                    <input type="password" name="password" value="" class="form-control" required="" />
                </div>
            </div>
        </fieldset>
        <br /><br />
        <fieldset>
            <legend>
                ข้อมูลส่วนตัว
            </legend>
            <div class="row">
				<div class="col-md-3">
					<label>คำนำหน้า</label>
					<input type="radio" name="title" value="นาย" checked=""> นาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="title" value="นาง" > นาง
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="title" value="นางสาว" > นางสาว
				</div>
				<div class="col-md-3">
					<label>เพศ</label>
					<input type="radio" name="gender" value="ชาย" checked=""> ชาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="gender" value="หญิง" > หญิง
				</div>
                                <div class="col-md-3">
					
				</div>
                                <div class="col-md-3">
					
				</div>
			</div>
			<br />
			<div class="row">
				<div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ชื่อ</label>
					<input type="text" name="fname" value="" class="form-control" required="" />
				</div>
				 <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>นามสกุล</label>
					<input type="text" name="lname" value="" class="form-control" required="" />
				</div>
				<div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>เบอร์โทรศัพท์</label>
					<input type="text" id="mobile" name="mobile" value="" class="form-control" onblur="formatPhone(this);" maxlength="10" required="" />
				</div>
				<div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>อีเมล์</label>
					<input type="email" name="email" value="" class="form-control" placeholder="jane.doe@example.com"  required="" />	
				</div>
			</div>
			<br />
			<div class="row">				 
				<div class="col-md-9">
					<label style="color:red;">**&nbsp;</label><label>ที่อยู่</label>
					<textarea name="address" class="form-control" required=""></textarea>
				</div>
                                <div class="col-md-3">
					<label>จังหวัด</label>
					<select id="province" name="province" class="form-control">
					<?php
					   if ($rows_province != false) {
                                                foreach ($rows_province as $row_province) {
                                         ?>				
					   <option value="<?= $row_province["name"] ?>" ><?= $row_province["name"] ?></option>
					<?php } } ?>
					</select> 
				</div>  
			</div>
			<br /><br />
			<div class="row">
				<div class="col-md-12 center-block">
					<button type="submit" class="btn btn-primary center-block">
							บันทึกข้อมูล
					</button>
				</div>
			</div>
        </fieldset>
    </form>
</div>
    </body>
</html>