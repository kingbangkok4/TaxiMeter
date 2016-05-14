<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/rent.php";

// insert rent
$obj = new Rent();       

$data = array(
    "carID" => $_REQUEST["carID"],
    "driverID" => $_REQUEST["driverID"],
    "dateFrom" => $_REQUEST["dateFrom"],
    "dateTo" => $_REQUEST["dateTo"],
    "price" => $_REQUEST["price"],
    "shift" => $_REQUEST["shift"]
);

 $checkRent = $obj->read(" carID = {$data["carID"]} AND rentDate >= '{$data["dateFrom"]}' AND returnDate <= '{$data["dateTo"]}' AND shift = '{$data["shift"]}' ");         
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
          <form class="form-horizontal" role="form" method="post" action="index.php?viewName=add_rent">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">แจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">ช่วงเวลานี้ เคยมีผู้เช่ารถคันนี้ไปแล้ว !</p>
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

           <?php
                if ($checkRent == NULL) {
                   $obj->insert($data);
                    //echo $sql;
                   redirect("index.php?viewName=rentList");
                } else {                       
                    echo "msgShow();";
                }             			    
           ?>
 	</script>
    
    </body>
</html>
