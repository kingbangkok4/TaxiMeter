<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read(" quantity <= low_quantity ");
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลสินค้าต้องสั่งซื้อเพิ่ม</label></h3>  
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th>ลำดับ</th>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>หน่วยนับ</th>
                    <th>จำนวน</th>
                    <th>จำนวนขั้นต่ำ</th>
                    <th>ราคา</th>
                    <th>เวลา</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr class="warning">
                            <td><?= $count++; ?></td>
                            <td><?= $row["product_id"] ?></td>
                            <td><?= $row["product_name"] ?></td>
                            <td><?= $row["product_unit"] ?></td>
                            <td><?= $row["quantity"] ?></td>
                            <td><?= $row["low_quantity"] ?></td>
                            <td><?= $row["product_price"] ?></td>
                            <td><?= $row["timestamp"] ?></td>                           
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>