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
    <br /><br>
	<div class="col-md-2"></div>
    <div class="table-responsive col-md-8">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">รหัสสินค้า</th>
                    <th class="text-center">ชื่อสินค้า</th>                  
                    <th class="text-center">จำนวน</th>
					<th class="text-center">หน่วยนับ</th>
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
							<td class="text-center"><?= $row["product_unit"] ?></td>							
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
	<div class="col-md-2"></div>
</div>