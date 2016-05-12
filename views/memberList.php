<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/member.php";
$obj = new Member();
$obj->sql = "select * from member";
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลคนขับ</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<a href="index.php?viewName=add_user" class="btn  btn-sm btn-primary pull-right">เพิ่มคนขับ</a>
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อคนขับ</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">ที่อยู่</th>
                    <th class="text-center">เพศ</th>
					<th class="text-center">ประเภท</th>
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
                            <td class="text-center"><?= $row["fullname"] ?></td>
                            <td class="text-center"><?= $row["email"] ?></td>
                            <td class="text-center"><?= $row["mobile"] ?></td>
                            <td class="text-center"><?= $row["address"] ?></td>
                            <td class="text-center"><?= $row["gender"] ?></td>
							<td class="text-center"><?= $row["type"] ?></td>
                            <td class="text-center">
                                <a href="index.php?viewName=editEmployee&id=<?= $row["id"] ?>" class="btn btn-sm btn-success">
							แก้ไข
                                </a>
								<?php if($row["type"] == "Staff") {?>
                                <a onclick="return confirm('ยืนยันการลบพนักงาน')" href="deleteEmployee.php?id=<?= $row["id"] ?>" class="btn btn-sm btn-danger">
                                                                                            ลบ
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