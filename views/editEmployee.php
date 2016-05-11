<?php
include "./model/employee.php";
$obj = new Employee();
$id = $_REQUEST["id"];
$rows = $obj->read(" e.user_ref = {$_REQUEST["user_ref"]} ");
if ($rows != false) {
    $row = $rows[0];
    $users = $obj->get_user(" id = {$_REQUEST["user_ref"]} ");
	$user = $users[0];
	
	$rows_province = $obj->read_province();
}
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
    <form action="doUpdateEmployee.php" method="post" class="form form-horizontal" style="font-size:12px;"  onsubmit="return CheckMobileNumber()">
        <input type="hidden" name="user_ref" value="<?=$_REQUEST["user_ref"]?>" />		
		 <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
				    <label>username</label>
					<input type="text" name="username" value="<?= $user["username"] ?>" class="form-control" required="" />
				</div>				
				<div class="col-md-3 col-sm-6 col-xs-12">
					<label>password</label>
					<input type="password" name="password" value="<?= $user["password"] ?>" class="form-control" required="" />
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
					<input type="radio" name="title" value="นาย" checked="" <?php echo ($row["title"] == "นาย") ? "checked" : "" ?> > นาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="title" value="นาง" <?php echo ($row["title"] == "นาง") ? "checked" : "" ?> > นาง
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="title" value="นางสาว" <?php echo ($row["title"] == "นางสาว") ? "checked" : "" ?> > นางสาว
				</div>
					<div class="col-md-3">
					<label>รหัสตัวแทน</label>
					<input type="text" name="id" value="<?php echo $id; ?>" class="form-control text-center" readonly="readonly" required="" />
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<label>ชื่อ-สกุล</label>
					<input type="text" name="fullname" value="<?= $row["fullname"] ?>" class="form-control" required="" />
				</div>
				<div class="col-md-3">
					<label>เบอร์โทรศัพท์</label>
					<input type="text" id="mobile" name="mobile" value="<?= $row["mobile"] ?>" onblur="formatPhone(this);" maxlength="10" class="form-control"  required="" />
				</div>
				<div class="col-md-3">
					<label>อีเมล์</label>
					<input type="email" name="email" value="<?= $row["email"] ?>" class="form-control"  required="" />
				</div>
				<div class="col-md-3">
					<label>จังหวัด</label>
					<select id="province" name="province" class="form-control">
						<?php
							if ($rows_province != false) {
								foreach ($rows_province as $row_province) {
								?>				
								  <option <?php if ($row["province"] == $row_province["name"] ) echo 'selected' ; ?> value="<?= $row_province["name"] ?>" ><?= $row_province["name"] ?></option>
							<?php } } ?>
					</select> 
				</div>
			</div>			
			<div class="row">
				<div class="col-md-3">
					<label>ที่อยู่</label>
					</textarea>
					<textarea name="address" class="form-control" required=""><?= $row["address"] ?></textarea
				</div>
			</div>
		
			<div class="row">
				<br /><br />
				<div class="col-md-12 center-block">
					<button type="submit" class="btn btn-primary center-block">
						บันทึกข้อมูล
					</button>
				</div>
			</div>
        </fieldset>
    </form>
</div>