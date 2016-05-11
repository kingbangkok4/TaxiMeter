<?php
header('Content-Type: text/html; charset=utf-8');
include "./model/product.php";
$obj = new Product();
$rows = $obj->read_out();
//var_dump($rows);
?>
<div class="container">
    <h3><label class="label label-warning">รายงานสถานะการชำระเงิน</label></h3>
   <!-- <div class="col-md-12 pull-right">
    	 <a href="index.php?viewName=add_product_out&id=&name=" class="btn  btn-sm btn-primary pull-right">เบิกสินค้า</a>
    </div> -->
    <br /><br>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                	<th class="text-center">ลำดับ</th>
                    <th class="text-center">เลขที่ใบเบิก</th>
                    <th class="text-center">รหัสสินค้า</th>
					<th class="text-center">ชื่อสินค้า</th>					
                    <th class="text-center">จำนวนที่เบิก</th>
					<th class="text-center">หน่วยนับ</th>
					<th class="text-center">ราคา</th>
					<th class="text-center">ราคารวม</th>
                    <th class="text-center">วันที่ขาย</th>
					<th class="text-center">ผู้ขาย</th>  		
                    <th class="text-center">สถานะการชำระเงิน</th>                    
                    <!-- <th class="text-center">ดำเนินการ</th> -->
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
							<td class="text-right"><?= number_format($row["product_price"]) ?> บาท</td>   
							<td class="text-right"><?= number_format($row["sum_price"]) ?> บาท</td>   							
                            <td class="text-center"><?= $row["productout_date"] ?></td>       
							<td class="text-center"><?= $row["user"] ?></td>   					
                            <td class="text-center">
                            <form action="doUpdateStatus.php" method="post" class="form-horizontal" onsubmit="return confirm('ยืนยันการจ่าย?');" >				    
							<select id="status" name="status">							  
							  <option <?php if ($row["pay_status"] == true ) echo 'selected' ; ?> value=true>จ่ายแล้ว</option>
                              <option <?php if ($row["pay_status"] == false ) echo 'selected' ; ?> value=false>ยังไม่ได้จ่าย</option>
                            </select> 
							 <input type="hidden" id="id" name="id" value="<?= $row["id"] ?>"> 
							 <?php if ($row["pay_status"] == false ) { ?>
								<input class="btn btn-sm btn-primary" type="submit" value="ดำเนินการ" />
							 <?php } ?>
							</form>
                            </td>
                            <!--  <td class="text-center">
                                <a onclick="return confirm('ยืนยันการลบรายการรับสินค้า')" href="deleteProductOut.php?id=<?//= $row["id"] ?>" class="btn btn-sm btn-danger">                                ลบ
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
	<div class="row">
		<label class="col-md-12 label-danger">*** กรุณาชำระเงินภายใน 7 วัน</label>
	</div>
</div>