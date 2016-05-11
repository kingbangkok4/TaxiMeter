<?php
	header('Content-Type: text/html; charset=utf-8');
	include "./model/product.php";
	$obj = new Product();
	$rows_unit = $obj->read_unit();
	$new_product_id = $obj->get_new_product_id();
?>

<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		 		
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
    <form action="doAddProduct.php" method="post" class="form form-horizontal" style="font-size:12px;">
        <fieldset>
            <legend>
                เพิ่มสินค้าเข้าระบบ
            </legend>
            <div class="col-md-3">
                <label>รหัสสินค้า</label>
                <input type="text" name="product_id" value="<?php echo $new_product_id; ?>" class="form-control" readonly="readonly" required="" />
            </div>
            <div class="col-md-3">
                <label>ชื่อสินค้า</label>
                <input type="text" name="product_name" value="" class="form-control" required="" />
            </div>
			<div class="col-md-3">
                <label>จำนวน</label>
                <input type="text" id="quantity" name="quantity" value="" class="form-control text-right" required="" />
            </div>
            <div class="col-md-3">
                <label>หน่วยนับ</label>
				<select id="product_unit" name="product_unit" class="form-control">
					<?php
						if ($rows_unit != false) {
							foreach ($rows_unit as $row_unit) {
							?>				
							  <option value="<?= $row_unit["name"] ?>" ><?= $row_unit["name"] ?></option>
						<?php } } ?>
				</select> 
            </div> 
			<div class="col-md-3">
                <label>ราคาซื้อ(บาท)</label>
                <input type="text" id="product_cost" name="product_cost" value="" class="form-control text-right" placeholder="บาท" required=""  />
            </div>			
           <div class="col-md-3">
                <label>ราคาขาย(บาท)</label>
                <input type="text" id="product_price" name="product_price" value="" class="form-control text-right" placeholder="บาท" required=""  />
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