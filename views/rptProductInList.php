<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read_in();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">รายงานการรับสินค้า</label></h3>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่ใบรับ</th>
                    <th class="text-center">รหัสสินค้า</th>
					<th class="text-center">ชื่อสินค้า</th>
                    <th class="text-center">จำนวนที่รับ</th>
					<th class="text-center">หน่วยนับ</th>
					<th class="text-center">ราคา</th>
					<th class="text-center">ราคารวม</th>
                    <th class="text-center">วันที่รับ</th>    
					<th class="text-center">ผู้รับ</th>    					       
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
                            <td class="text-center"><?= $row["id"] ?></td>
                            <td class="text-center"><?= $row["product_id"] ?></td>
							<td class="text-center"><?= $row["product_name"] ?></td>
                            <td class="text-right"><?= number_format($row["quantity"]) ?></td>  
							<td class="text-center"><?= $row["product_unit"] ?></td>		
							<td class="text-right"><?= number_format($row["product_price"]) ?>  บาท</td>   
							<td class="text-right"><?= number_format($row["sum_price"]) ?>  บาท</td>   								
                            <td class="text-center"><?= $row["productin_date"] ?></td>  
							<td class="text-center"><?= $row["user"] ?></td>    							
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>