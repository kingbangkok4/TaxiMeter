<?php
    include "./model/car.php";
    $obj = new Car();
    $carID = $_REQUEST["carID"];
    $rows = $obj->read(" carID = {$carID} ");
    if ($rows != false) {
        $row = $rows[0];
    }
?>
<div class="container">
    <form action="doUpdateCar.php" method="post" class="form form-horizontal" role="form" style="font-size:12px;" >
        <input type="hidden" name="carID" value="<?=$_REQUEST["carID"]?>" />
        <fieldset>
            <legend>
                แก้ไขข้อมูลรถ
            </legend>			
			<div class="row">
				<div class="col-md-3">
                                    <label style="color:red;">**&nbsp;</label><label>ยี่ห้อ</label>
                                    <input type="text" name="brand" value="<?= $row["brand"] ?>" class="form-control" required="" />
				</div>
				 <div class="col-md-3">
					<label style="color:red;">**&nbsp;</label><label>ป้ายทะเบียน</label>
					<input type="text" name="licensePlate" value="<?= $row["licensePlate"] ?>" class="form-control" required="" />
				</div>
                                 <div class="col-md-3">
                                    <label>สถานะ</label>
                                    <select id="status" name="status" class="form-control">
                                         <option <?php if ($row["status"] == "ปกติ" ) echo 'selected' ; ?> value="ปกติ">ปกติ</option>
                                         <option <?php if ($row["status"] == "ซ่อมบำรุง" ) echo 'selected' ; ?> value="ซ่อมบำรุง">ซ่อมบำรุง</option>
                                    </select> 
                                </div>
			</div>
			
			<br /><br />
			<div class="row">
				<div class="col-md-12 center-block">
					<button type="submit" class="btn btn-primary center-block">
						บันทึกข้อมูล
					</button>
				</div>
			</div>
        </fieldset>
    </form>
</div>