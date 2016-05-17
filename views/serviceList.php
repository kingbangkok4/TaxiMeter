<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/service.php";
$obj = new Service();
$condition = " 1 ";
if($_SESSION["userType"] <> "Admin") { 
    $condition = " s.memberID =  {$_SESSION["id"]} ";
}
$rows = $obj->read($condition);
//echo " WHERE s.memberID =  {$_SESSION["id"]} ";
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลคนขับ</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_driver" class="btn  btn-sm btn-primary pull-right">เพิ่มคนขับ</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อคนขับ</th>
                    <th class="text-center">รหัสบัตรประชาชน</th>                                   
                    <th class="text-center">ยี่ห้อรถ</th>
                    <th class="text-center">ป้ายทะเบียน</th>
	            <th class="text-center">ชื่อผู้ใช้บริการ</th>
                    <th class="text-center">วันที่ใช้บริการ</th>
                    <th class="text-center">สถานะ</th>
                    <?php if($_SESSION["userType"] == "Admin") { ?>
                        <th class="text-center">ดำเนินการ</th>
                    <?php } ?>
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
                            <td class="text-center"><?= $row["name_driver"] ?></td>
                            <td class="text-center"><?= $row["idCard"] ?></td>
                            <td class="text-center"><?= $row["brand"] ?></td>
                            <td class="text-center"><?= $row["licensePlate"] ?></td>
                            <td class="text-center"><?= $row["name_member"] ?></td>
			    <td class="text-center"><?= $row["serviceDate"] ?></td>
                            <td class="text-center"><?= $row["status"] ?></td>
                            <?php if($_SESSION["userType"] == "Admin") { ?>
                                <td class="text-center">
                                    <?php if($row["status"] == "กำลังให้บริการ") { ?>
                                        <a href="doUpdateStatusService.php?serviceID=<?= $row["serviceID"] ?>" class="btn btn-sm btn-success">
                                           สิ้นสุดการให้บริการ
                                        </a>
                                        <a onclick="return confirm('ยืนยันการยกเลิกให้บริการ')" href="deleteService.php?serviceID=<?= $row["serviceID"] ?>" class="btn btn-sm btn-danger">
                                           ยกเลิก
                                        </a>
                                     <?php } ?>   
                               </td>                           
                         <?php } ?>   
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>