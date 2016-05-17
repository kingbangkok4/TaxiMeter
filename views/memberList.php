<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/member.php";
$obj = new Member();
$rows = $obj->read();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">ข้อมูลลูกค้า</label></h3>
    <br /><br>
    <div class="col-md-12 pull-right">
    	<!-- <a href="index.php?viewName=add_user" class="btn  btn-sm btn-primary pull-right">เพิ่มลูกค้า</a> -->
    </div>
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ชื่อลูกค้า</th>
                    <th class="text-center">E-mail</th>
                    <th class="text-center">เบอร์โทร</th>
                    <th class="text-center">ที่อยู่</th>
                    <th class="text-center">เพศ</th>
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
                            <td class="text-center"><?= $row["name"] ?></td>
                            <td class="text-center"><?= $row["email"] ?></td>
                            <td class="text-center"><?= $row["phone"] ?></td>
                            <td class="text-center"><?= $row["address"] ?></td>
                            <td class="text-center"><?= $row["gender"] ?></td>
                            <td class="text-center">
                                <a href="index.php?viewName=editMember&user_ref=<?= $row["user_ref"] ?>" class="btn btn-sm btn-success">
				   แก้ไข
                                </a>
                                <a onclick="return confirm('ยืนยันการลบลูกค้า')" href="deleteMember.php?user_ref=<?= $row["user_ref"] ?>" class="btn btn-sm btn-danger">
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