<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$name = $_REQUEST["name"];
$id = $_REQUEST["id"];
$rows = $obj->read(" product_name LIKE '%{$name}%' AND quantity > 0 ");
?>
<style>
    .color-box{
        display: inline-block;
        height: 25px;
        width: 90px;
    }
</style>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('#product_expire').datepicker({
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
	
	});

</script>
           
<div class="container">
<legend>
    <h3><label class="label label-warning">รับสินค้า</label></h3>
</legend>	

 <form class="form-horizontal" role="form" method="post" action="?viewName=add_product_in">
            <div class="row">
				 <div class="col-md-3">
					<input type="text" placeholder="ชื่อสินค้า" name="name" value="<?= $name ?>" class="form-control text-center" />
                    <input type="hidden" name="id" />
				</div>			
				 <div class="col-md-9">
				<button class="btn btn-success pull-left" type="submit" data-toggle="modal" data-target="#myModal">
                    ค้นหาสินค้า
                </button>
				</div>				
			</div>
            <br /><br />
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">เลือกสินค้า</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center"></p>								   
                        <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="font-size:12px;">
                            <thead>
                                <tr class="success">
                                    <th class="text-center">ลำดับ</th>
                                    <th class="text-center">รหัสสินค้า</th>
                                    <th class="text-center">ชื่อสินค้า</th>
                                    <th class="text-center">หน่วยนับ</th>
                                    <th class="text-center">จำนวน</th>
                                    <th class="text-center">จำนวนขั้นต่ำ</th>
                                    <th class="text-center">ราคา</th>
                                    <th class="text-center">ดำเนินการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($rows != false) {
                                    $count = 1;
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                       		<td class="text-center"><?= $count++; ?></td>
                                            <td class="text-center"><?= $row["product_id"] ?></td>
                                            <td class="text-left"><?= $row["product_name"] ?></td>
                                            <td class="text-center"><?= $row["product_unit"] ?></td>
                                            <td class="text-right"><?= number_format($row["quantity"]) ?></td>
                                            <td class="text-right"><?= number_format($row["low_quantity"]) ?></td>
                                            <td class="text-right"><?= number_format($row["product_price"]) ?> บาท</td>
                                            <td class="center-block">
                                                <a href="index.php?viewName=add_product_in&id=<?= $row["product_id"] ?>&name=" class="btn btn-sm btn-primary center-block">
                                                    เลืิอก
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                 </div>
              </div>           
            </div><!-- /.modal-content -->
    </form>
            
    <form action="doAddIn.php" method="post" class="form form-horizontal">
        <fieldset>          
            <div class="row">
				 <div class="col-md-3">
					<label>รหัสสินค้า</label>
					<input type="text" name="id" readonly="readonly" value="<?= $id ?>" class="form-control text-center" required="" />
				</div>			
				<div class="col-md-3">
					<label>จำนวน</label>
					<input type="text" id="quantity" name="quantity" value="0" class="form-control text-right"  required="" />
				</div>
								
				<div class="col-md-6">
				<br />
					<button type="submit" class="btn btn-primary">
						บันทึกข้อมูล
					</button>
				</div>
			</div>
        </fieldset>
    </form>
</div>
