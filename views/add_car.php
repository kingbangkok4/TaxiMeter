<?php
    header('Content-Type: text/html; charset=utf-8');
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
    <form action="doAddCar.php" method="post" class="form form-horizontal" role="form" style="font-size:12px;" >
        <fieldset>
            <legend>
                เพิ่มรถ
            </legend>			
			<div class="row">
				<div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ยี่ห้อ</label>
					<input type="text" name="brand" value="" class="form-control" required="" />
				</div>
				 <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ป้ายทะเบียน</label>
					<input type="text" name="licensePlate" value="" class="form-control" required="" />
				</div>
                                 <div class="col-md-3">
                                    <label>สถานะ</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="ปกติ" >ปกติ</option>
                                        <option value="ซ่อมบำรุง" >ซ่อมบำรุง</option>
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