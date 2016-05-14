<?php
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/driver.php";

// insert Driver
$obj = new Driver();

$data = array(
"name" => $_REQUEST["title"]." ".$_REQUEST["fname"]." ".$_REQUEST["lname"],
"idCard" => $_REQUEST["idCard"],
"gender" => $_REQUEST["gender"],
"birthday" => $_REQUEST["birthday"],
"address" => $_REQUEST["address"]." จ.".$_REQUEST["province"],
"email" => $_REQUEST["email"],
"phone" => $_REQUEST["mobile"]
);

$checkDriver = $obj->read(" idCard = '{$data["idCard"]}' ");
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
          <form class="form-horizontal" role="form" method="post" action="index.php?viewName=add_driver">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">แจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">รหัสบัตรประชาชนนี้ มีอยู่ในระบบแล้ว !</p>
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
                if($checkDriver == null) {
                  $obj->insert($data);
                  redirect("index.php?viewName=driverList");
                } else {                       
                    echo "msgShow();";
                }             			    
           ?>
 	</script>
    
    </body>
</html>