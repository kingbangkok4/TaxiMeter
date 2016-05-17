<?php
include "./model/user.php";
include "./model/member.php";
$obj_user = new User();
$obj = new Member();
$rows = $obj->read(" user_ref = {$_REQUEST["user_ref"]} ");
if ($rows != false) {
    $row = $rows[0];
    $users = $obj_user->read(" userID = {$row["user_ref"]} ");
    $user = $users[0];
}
?>
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
<div class="container">
    <form action="doUpdateMember.php" method="post" class="form form-horizontal" onsubmit="return CheckMobileNumber()">
        <input type="hidden" name="user_ref" value="<?=$_REQUEST["user_ref"]?>" />
        <fieldset>
            <legend>
                ข้อมูลสำหรับเข้าระบบ
            </legend>
            <div class="col-md-3">
                <label>Username</label>
                <input type="text" name="username" value="<?= $user["username"] ?>" class="form-control" required="" />
            </div>
            <div class="col-md-3">
                <label>Password</label>
                <input type="password" name="password" value="<?= $user["password"] ?>" class="form-control" required="" />
            </div>
        </fieldset>

        <fieldset>
            <legend>
                ข้อมูลส่วนตัวลูกค้า
            </legend>
             <div class="row">
                <div class="col-md-3">
                    <label>ชื่อลูกค้า</label>
                    <input type="text" name="name" value="<?= $row["name"] ?>" class="form-control" required="" />
                </div>
                <div class="col-md-3">
                    <label>เบอร์โทรศัพท์</label>
                    <input type="text" name="mobile" value="<?= $row["phone"] ?>" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label>อีเมล์</label>
                    <input type="email" name="email" value="<?= $row["email"] ?>" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label>ที่อยู่</label>
                    <input type="text" name="address" value="<?= $row["address"] ?>" class="form-control" />
                </div>
                <div class="col-md-3">
                    <label>เพศ</label>
                    <input type="radio" name="gender" value="ชาย" checked="" <?php echo ($row["gender"] == "ชาย") ? "checked" : "" ?> > ชาย
                    &nbsp; &nbsp; &nbsp;
                    <input type="radio" name="gender" value="หญิง" <?php echo ($row["gender"] == "หญิง") ? "checked" : "" ?> > หญิง
                </div>
             </div>
            <br /><br />
           <div class="row">
            <div class="col-md-3 text-center">
                <button type="submit" class="btn btn-primary">
                    บันทึกข้อมูล
                </button>
            </div>
           </div>
        </fieldset>
    </form>
</div>