<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/service.php";

// insert Driver
$obj = new Service();

$driverIDcarID = explode(",", $_REQUEST["driverIDcarID"]);
//echo $driverIDcarID[0]; // 
//echo $driverIDcarID[1]; // 

$data = array(
    "driverID" => $driverIDcarID[0],
    "carID" => $driverIDcarID[1],
    "serviceDate" => $_REQUEST["dateFrom"],
    "memberID" => $_SESSION["id"]
);
echo $_SESSION["id"];
//echo "INSERT INTO service (`serviceID`, `carID`, `driverID`, `serviceDate`, `status`) VALUES (NULL, {$data["carID"]}, {$data["driverID"]}, '{$data["serviceDate"]}', 'กำลังให้บริการ') ";

$checkService = $obj->read(" s.driverID = '{$data["driverID"]}'  AND DATE_FORMAT(s.serviceDate,'%Y-%m-%d') = '{$data["serviceDate"]}'  AND s.status = 'กำลังให้บริการ' ");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
	<link href="css/site.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
        <!--<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>          
    </head>
    <body>
        
        <div class="modal fade" tabindex="-1" role="dialog"  id="myModal" name="myModal">
          <div class="modal-dialog">
          <form class="form-horizontal" role="form" method="post" action="index.php?viewName=add_service">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">แจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">แท๊กซี่คันนี้ให้บริการลูกค้าท่านอื่นอยู่ !</p>
              </div>
              <div class="modal-footer">
                 <input type="submit" value="OK" id="submit" name="submit" class="btn btn-primary">
              </div>
            </div><!-- /.modal-content -->
            </form>
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div class="modal fade" tabindex="-1" role="dialog"  id="myModalSussess" name="myModalSussess">
          <div class="modal-dialog">
          <form class="form-horizontal" role="form" method="post" action="index.php?viewName=add_service">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">ถถานะการจองแท๊กซี่</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">จองแซ๊กซี่สำเร็จ</p>
              </div>
              <div class="modal-footer">
                 <input type="submit" value="OK" id="submit" name="submit" class="btn btn-primary">
              </div>
            </div><!-- /.modal-content -->
            </form>
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

	<script type="text/javascript">
            function msgShow(){
                //alert("hello world");
                $('#myModal').modal('toggle');
                $('#myModal').modal('show');
                //$('#myModal').modal('hide');
            }

            function msgSuccess(){
                //alert(x);
                //alert("hello world");
                $('#myModalSussess').modal('toggle');
                $('#myModalSussess').modal('show');
                //$('#myModal').modal('hide');
            }
            
           <?php
                if($checkService == null) {
                  $sql = $obj->insert($data);
                  echo "msgSuccess();";
                  //redirect("index.php?viewName=add_service");
                } else {                       
                    echo "msgShow();";
                }             			    
           ?>
 	</script>
    
    </body>
</html>