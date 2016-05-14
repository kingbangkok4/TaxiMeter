<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/rent.php";
$obj = new Rent();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">การเช่า - คืน</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_rent" class="btn  btn-sm btn-primary pull-right">เพิ่มการเช่า</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">รหัสการเช่า</th>
                    <th class="text-center">รหัสรถ</th>                                   
                    <th class="text-center">รหัสคนขับ</th>
                    <th class="text-center">วันที่จอง</th>
	            <th class="text-center">วันที่คืน</th>
                    <th class="text-center">ราคา</th>
                    <th class="text-center">ช่วงเวลา</th>
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
                            <td class="text-center"><?= $row["rentID"] ?></td>
                            <td class="text-center"><?= $row["carID"] ?></td>
                            <td class="text-center"><?= $row["driverID"] ?></td>
                            <td class="text-center"><?= $row["rentDate"] ?></td>
                            <td class="text-center"><?= $row["returnDate"] ?></td>
			    <td class="text-center"><?= $row["price"] ?></td>
                            <td class="text-center"><?= $row["shift"] ?></td>
                            <td class="text-center"><?= $row["status"] ?></td>
                            <td class="text-center">
                                <?php if($row["status"] == "ยังไม่ได้คืนรถ") { ?>
                                    <a href="doStatusRent.php?rentID=<?= $row["rentID"] ?>" class="btn btn-sm btn-success">
                                       คืนรถ
                                    </a>
                                <?php } ?>
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