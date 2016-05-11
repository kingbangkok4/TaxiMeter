<?php
	header('Content-Type: text/html; charset=utf-8');
	include "./model/employee.php";
	$obj = new Employee();
	$rows_province = $obj->read_province();
	$new_employee_id = $obj->get_new_employee_id();
?>
<script type="text/javascript">
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
<div class="container">
    <form action="doAddEmployee.php" method="post" class="form form-horizontal" role="form" style="font-size:12px;" onsubmit="return CheckMobileNumber()">
        <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<label style="color:red;">**&nbsp;</label><label>username</label>
					<input type="text" name="username" value="" class="form-control" required="" />
				</div>				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<label style="color:red;">**&nbsp;</label><label>password</label>
					<input type="password" name="password" value="" class="form-control" required="" />
				</div>				
			</div>
        </fieldset>

        <fieldset>
            <legend>
                ข้อมูลตัวแทน
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
					<label>รหัสตัวแทน</label>
					<input type="text" name="id" value="<?php echo $new_employee_id; ?>" class="form-control text-center" readonly="readonly" required="" />
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
				<div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ที่อยู่</label>
					<textarea name="address" class="form-control" required=""></textarea>
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