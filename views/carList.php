<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/car.php";
$obj = new Car();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลรถ</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_car" class="btn  btn-sm btn-primary pull-right">เพิ่มรถ</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ยี่ห้อ</th>
                    <th class="text-center">ป้ายทะเบียน</th>                                   
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
                            <td class="text-center"><?= $row["brand"] ?></td>
                            <td class="text-center"><?= $row["licensePlate"] ?></td>
                            <td class="text-center"><?= $row["status"] ?></td>
                            <td class="text-center text-center">
                                <a href="index.php?viewName=editCar&carID=<?= $row["carID"] ?>" class="btn btn-sm btn-success">
				   แก้ไข
                                </a>
                                <a onclick="return confirm('ยืนยันการลบคนขับ')" href="deleteCar.php?carID=<?= $row["carID"] ?>" class="btn btn-sm btn-danger">
                                   ลบ
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