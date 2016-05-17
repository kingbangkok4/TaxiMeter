<?php 
   include "./model/driver.php";
    $obj = new Driver();
    $driverID = $_REQUEST["driverID"];
    $rows = $obj->read(" driverID = {$driverID} ");
    if ($rows != false) {
        $row = $rows[0];
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
 <form action="doUpdateDriver.php" method="post" class="form form-horizontal" role="form" style="font-size:12px;" onsubmit="return CheckMobileNumber()">
     <input type="hidden" name="driverID" value="<?= $_REQUEST["driverID"] ?>" />
     <fieldset>
            <legend>
                เพิ่มคนขับ
            </legend>                      
			<div class="row">
				<div class="col-md-3">
					<label>เพศ</label>
					<input type="radio" name="gender" value="ชาย" checked="" <?php echo ($row["gender"] == "ชาย") ? "checked" : "" ?> > ชาย
					&nbsp; &nbsp; &nbsp;
					<input type="radio" name="gender" value="หญิง" <?php echo ($row["gender"] == "หญิง") ? "checked" : "" ?> > หญิง
				</div>
                                <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>รหัสบัตรประชาชน</label>
					<input type="text" name="idCard" value="<?= $row["idCard"] ?>" class="form-control" required="" />
				</div>
                                <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>วันเกิด (ป-ด-ว)</label>
					<input style="text-align:center;"  type="text" placeholder=""  id="birthday"  name="birthday" class="form-control" readonly="readonly"  value="<?= $row["birthday"] ?>" required="">
				</div>
                                <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ชื่อ</label>
                                        <input type="text" name="name" value="<?= $row["name"] ?>" class="form-control" required="" />
				</div>
			</div>
			<br />
                        <div class="row">	
                            <div class="col-md-3">
                                            <label style="color:red;">**&nbsp;</label><label>เบอร์โทรศัพท์</label>
                                            <input type="text" id="mobile" name="mobile" value="<?= $row["phone"] ?>" class="form-control" onblur="formatPhone(this);" maxlength="10" required="" />
                            </div>
                            <div class="col-md-3">
                                    <label style="color:red;">**&nbsp;</label><label>อีเมล์</label>
                                    <input type="email" name="email" value="<?= $row["email"] ?>" class="form-control" placeholder="jane.doe@example.com"  required="" />	
                            </div>				 
                            <div class="col-md-6">
                                    <label style="color:red;">**&nbsp;</label><label>ที่อยู่</label>
                                    <textarea name="address" class="form-control" required=""><?= $row["address"] ?></textarea>
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