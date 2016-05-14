<?php
	header('Content-Type: text/html; charset=utf-8');
	include "./model/car.php";
        include "./model/driver.php";
        
        $objCar = new Car();
	$objDriver = new Driver();
        
        $rows_car = $objCar->read(" status = 'ปกติ' ");
	$rows_driver = $objDriver->read();	
?>

<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {	
                $('#dateFrom').datepicker({
			format: "yyyy-mm-dd"
		});  
		$('#dateTo').datepicker({
			format: "yyyy-mm-dd"
		});    

		$("#quantity").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
		});
		
		$("#low_quantity").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
		});
		
		$("#product_cost").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
		});
		
		$("#product_price").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			 // Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
				 // let it happen, don't do anything
				 return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
		});
	
	});

</script>

<div class="container">
    <form action="doAddRent.php" method="post" class="form form-horizontal" style="font-size:12px;">
        <fieldset>
            <legend>
                เพิ่มการเช่า
            </legend>
            <div class="col-md-3">
                <label>รถ</label>
                 <select id="carID" name="carID" class="form-control">
                    <?php
                            if ($rows_car != false) {
                                    foreach ($rows_car as $row_car) {
                              ?>				
                                      <option value="<?= $row_car["carID"] ?>" ><?= "{$row_car["brand"]} {$row_car["licensePlate"]}" ?></option>
                    <?php } } ?>
		</select> 
            </div>
            <div class="col-md-3">
                <label>ผู้เช่า(คนขับ)</label>
                <select id="driverID" name="driverID" class="form-control">
                    <?php
                            if ($rows_driver != false) {
                                    foreach ($rows_driver as $row_driver) {
                     ?>				
                                      <option value="<?= $row_driver["driverID"] ?>" ><?= $row_driver["name"] ?></option>
                    <?php } } ?>
		</select> 
            </div>
	   <div class="col-md-3">
                <label>วันที่จอง</label>
                <input style="text-align:center;"  type="text" placeholder=""  id="dateFrom"  name="dateFrom" class="form-control" readonly="readonly"  value="<?= date("Y-m-d") ?>" required="">
            </div>
             <div class="col-md-3">
                <label>วันที่คืน</label>
                <input style="text-align:center;"  type="text" placeholder=""  id="dateTo"  name="dateTo" class="form-control" readonly="readonly"  value="<?= date("Y-m-d") ?>" required="">
            </div>

	    <div class="col-md-3">
                <label>ราคา(บาท)</label>
                <input type="text" id="price" name="price" value="" class="form-control text-right" placeholder="บาท" required=""  />
            </div>			
           <div class="col-md-3">
                <label>ช่วงเวลา</label>
                <select id="shift" name="shift" class="form-control">
                    <option value="เช้า" >เช้า</option>
                    <option value="บ่าย" >บ่าย</option>
                    <option value="เย็น" >เย็น</option>
		</select> 
            </div>
            
            <div class="col-md-12 center-block">
	    <br /><br />
                <button type="submit" class="btn btn-primary center-block">
                            บันทึกข้อมูล
                </button>
            </div>
        </fieldset>
    </form>
</div>