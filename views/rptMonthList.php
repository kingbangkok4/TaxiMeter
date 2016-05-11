<?php
include "./model/product.php";
$dateF  = "";
$dateT = "";
$total = 0.00;
if ($_REQUEST["dateFrom"] != "" && $_REQUEST["dateTo"] != ""){
	$dateF = $_REQUEST["dateFrom"];
	$dateT =  $_REQUEST["dateTo"];
}
$obj = new Product();
$rows = $obj->read_sale(" DATE_FORMAT(po.productout_date,'%Y-%m-%d') >= '".$dateF."' AND DATE_FORMAT(po.productout_date,'%Y-%m-%d') <= '".$dateT."' ");

//echo ($rows);
//var_dump($rows);
?>
<style>
    .color-box{
        display: inline-block;
        height: 25px;
        width: 90px;
    }
</style>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('#dateFrom').datepicker({
			format: "yyyy-mm-dd"
		});  
		$('#dateTo').datepicker({
			format: "yyyy-mm-dd"
		});  
	});
</script>
<div class="container">
    <h3><label class="label label-warning">รายงานยอดขายแต่ละเดือน</label></h3>
   <form action="index.php?viewName=rptMonthList" method="post" class="form form-horizontal">
    <br /><br /><br /><br /> 
    <div class="table-responsive">		
		<div class="col-md-2 text-right">
			ตั้งแต่วันที่
		</div>
		<div class="col-md-3">
            <div class="hero-unit">
                <input style="text-align:center;"  type="text" placeholder=""  id="dateFrom"  name="dateFrom"class="form-control" readonly="readonly"  value="<?= $dateF ?>" required="">
            </div>
        </div>
		<div class="col-md-1 text-center">
			ถึง
		</div>
        <div class="col-md-3">
            <div class="hero-unit">
                <input  style="text-align:center;" type="text" placeholder=""  id="dateTo" name="dateTo" class="form-control" readonly="readonly" value="<?= $dateT ?>" required="">
            </div>
        </div>
        <div class="col-md-3">
				 <button type="submit" class="btn btn-primary" style="width:150px;">ค้นหา</button>
        </div>
        <br />
        <br />
		 <br />
        <br />
        <table class="table table-bordered table-hover" style="font-size:12px;">
            <thead>
                <tr class="success">
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">รหัสสินค้า</th>
                    <th class="text-center">ชื่อสินค้า</th>                    
                    <th class="text-center">จำนวน</th>
					<th class="text-center">หน่วยนับ</th>
                    <th class="text-center">ราคา</th>
                    <th class="text-center">ราคารวม</th>
                    <th class="text-center">วันที่ขายสินค้า</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($rows != false) {
                    $count = 1;
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td class="text-center"><?= $count++ ?></td>
                            <td class="text-center"><?= $row["product_id"] ?></td>
                            <td class="text-center"><?= $row["product_name"] ?></td>                            
                            <td class="text-right"><?= number_format($row["quantity"]) ?></td>
							<td class="text-center"><?= $row["product_unit"] ?></td>
                            <td class="text-right"><?= number_format($row["product_price"]) ?>  บาท</td>
                            <td class="text-right"><?= number_format($row["sum_price"]) ?>  บาท</td>
                            <td class="text-center"><?= $row["productout_date"] ?></td>
                        </tr>                       
                        <?php 
						$total += $row["sum_price"];
                    }
                }
                ?>
            </tbody>
        </table>
        <br /><br />
        <div class="col-md-12 pull-right">
        	<h4><label class="label label-success pull-right">รวมยอดขายทั้งหมด <?php echo " ".number_format($total)." "; ?> บาท</label></h4>
        </div>
    </div>
</div>
</form>
<script>
    $(function () {
        $(".color-box").each(function (index) {
            //console.log($(this).attr("data-code"));
            var codeHex = $(this).attr("data-code");
            $(this).css({backgroundColor: "#" + codeHex});
        });
    });
</script>