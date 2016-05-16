<?php
	header('Content-Type: text/html; charset=utf-8');
        include "./model/service.php";
        
        $objService = new Service();
        
        $rows_service = $objService->read_taxi(" c.status = 'ปกติ' AND r.status = 'ยังไม่ได้คืนรถ' ");
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
                เลือกแท๊กซี่เพื่อใช้บริการ
            </legend>
            <div class="col-md-6">
                <label>เลือกรถแท๊กซี่</label>
                 <select id="driverIDcarID" name="driverIDcarID" class="form-control">
                    <?php
                            if ($rows_service != false) {
                                    foreach ($rows_service as $row_service) {
                              ?>				
                                    <option value="<?= $row_service["driverID"] ?>,<?= $row_service["carID"] ?>" ><?= "{$row_service["brand"]} {$row_service["licensePlate"]} ผู้ขับ : {$row_service["name"]} {$row_service["idCard"]}" ?></option>
                    <?php } } ?>
		</select> 
            </div>
	   <div class="col-md-3">
                <label>วันที่จอง</label>
                <input style="text-align:center;"  type="text" placeholder=""  id="dateFrom"  name="dateFrom" class="form-control" readonly="readonly"  value="<?= date("Y-m-d") ?>" required="">
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