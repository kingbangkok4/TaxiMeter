<nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color:#51EA7E">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?viewName=employeeList">ระบบคลังสินค้าผลิตภัณฑ์เสริมอาหาร</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li><a href="?viewName=customerList">ลูกค้า</a></li>-->
				<?php if($_SESSION["userType"] == "Admin") { ?>
					<li>
						<a href="?viewName=employeeList">ข้อมูลตัวแทน <span class="sr-only">(current)</span></a></li>
				<?php } ?>
					<li>				
				 <li>
					<a href="?viewName=productList">ข้อมูลสินค้า <span class="sr-only"></a>
                 </li>    
                 <li>
					<ul class="nav nav-pills" style="margin-top:4px;">
					  <li class="dropdown">
						<a class="dropdown-toggle"
						   data-toggle="dropdown"
						   href="#">
							ข้อมูลเบิกรับสินค้า
							<b class="caret"></b>
						  </a>
						<ul class="dropdown-menu">
						  <li><a href="?viewName=productOutList">รายการเบิกสินค้า</a></li>
						  <li><a href="?viewName=productInList">รายการรับสินค้า</a></li>
						</ul>
					  </li>
					</ul>
				</li>       
                 <li>
					<ul class="nav nav-pills" style="margin-top:4px;">
					  <li class="dropdown">
						<a class="dropdown-toggle"
						   data-toggle="dropdown"
						   href="#">
							รายงาน
							<b class="caret"></b>
						  </a>
						<ul class="dropdown-menu">
						  <li><a href="?viewName=rptProductList">รายงานสินค้าคงเหลือ</a></li>
                           <li><a href="?viewName=rptProductInList">รายงานการรับสินค้า</a></li>
                           <li><a href="?viewName=rptProductOutList">รายงานการเบิกสินค้า</a></li>
                           <li><a href="?viewName=rptOutPayList">รายงานสถานะการชำระเงิน</a></li>
<li><a href="?viewName=rptMonthList&dateFrom=<?= date("Y-m-d") ?>&dateTo=<?= date("Y-m-d") ?>">รายงานยอดขายแต่ละเดือน</a></li>
						</ul>
					  </li>
					</ul>
				</li>       
            </ul>           
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
