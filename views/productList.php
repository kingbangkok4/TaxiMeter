<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลสินค้า</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_product" class="btn  btn-sm btn-primary pull-right">เพิ่มสินค้า</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:10px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">รหัสสินค้า</th>
                    <th class="text-center">ชื่อสินค้า</th>                   
                    <th class="text-center">จำนวน</th>
                    <th class="text-center">จำนวนขั้นต่ำ</th>
					<th class="text-center">หน่วยนับ</th>
					<th class="text-center">ราคาซื้อ(บาท)</th>
                    <th class="text-center">ราคาขาย(บาท)</th>
                    <th class="text-center">วันที่</th>
					<th class="text-center">สินค้าใกล้หมด</th>
					<th class="text-center">สถานะ</th>
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
                            <td class="text-center"><?= $row["product_name"] ?></td>                          
                            <td class="text-right"><?= number_format($row["quantity"]) ?></td>
                            <td class="text-right"><?= number_format($row["low_quantity"]) ?></td>
							<td class="text-center"><?= $row["product_unit"] ?></td>
							<td class="text-right"><?= number_format($row["product_cost"]) ?> บาท</td>	
                            <td class="text-right"><?= number_format($row["product_price"]) ?> บาท</td>							
                            <td class="text-center"><?= $row["timestamp"] ?></td>
							<td class="text-center">
								<?php if ($row["quantity"] <= $row["low_quantity"]){ 
									echo ('<img src="images/trouble.png" alt="Smiley face" height="30" width="30">');
								 }?>									
							</td>
							<td class="text-center" >
								<form action="doUpdateStatusProduct.php" method="post" class="form-horizontal" onsubmit="return confirm('ยืนยันการจแก้ไขสถานะสินค้า?');" >				    
								<select id="status" name="status">							  
								  <option <?php if ($row["status"] == true ) echo 'selected' ; ?> value=true>มีจำหน่อย</option>
								  <option <?php if ($row["status"] == false ) echo 'selected' ; ?> value=false>ไม่มีมีจำหน่อย</option>
								</select> 
								 <input type="hidden" id="id" name="id" value="<?= $row["id"] ?>"> 
								<input class="btn btn-sm btn-primary" type="submit" value="ดำเนินการ"  style="font-size:8px;" />
								</form>
                            </td>
                            <td>
                                <a href="index.php?viewName=editProduct&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
									แก้ไข
                                </a>
                                <!-- <a onclick="return confirm('ยืนยันการลบสินค้า')" href="deleteProduct.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
                                                                                            ลบ
                                </a> -->
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