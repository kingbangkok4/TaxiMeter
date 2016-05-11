<?php
//$session_start();
header('Content-Type: text/html; charset=utf-8');
include "./lib/std.php";
include "./lib/helper.php";
include "./lib/dbConnector.php";
include "./model/product.php";

// insert product
$obj = new Product();
$id = $_REQUEST["id"];
$quantity = $_REQUEST["quantity"];
?>

<html>

    <head>
        <meta charset="UTF-8">
        <title></title>
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
          <form class="form-horizontal" role="post" method="post" action="index.php?viewName=add_product_in">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">แจ้งเตือน</h4>
              </div>
              <div class="modal-body">
                <p style="text-align:center">กรุณาระบุ รหัสสินค้า หรือ จำนวนสินค้า!</p>
              </div>
              <div class="modal-footer">
                 <input type="hidden" name="id" value="">
                  <input type="hidden" name="name" value="">
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
		   		if($id  == "" || $quantity == "0" || $quantity == ""){
					echo "msgShow();";
				}else{
					$data = array(
					"product_id" => $_REQUEST["id"],
					"user" => $_SESSION["userName"],
					"quantity" => $_REQUEST["quantity"]
					);
					
					$product_refID = $obj->insert_in($data);
					if ($product_refID == false) {
						redirect("errorAddin.php.php");
						echo ($product_refID );
					} else {                          
						$obj->update_product_in($data);
						redirect("index.php?viewName=productInList");
					}
				}    
           ?>
 	</script>
    
    </body>
</html>
