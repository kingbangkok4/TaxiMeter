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
            <a class="navbar-brand" href="?viewName=driverList">ระบบบริการแท๊กซี่</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                    <?php if($_SESSION["userType"] == "Admin") { ?>
                            <li>
                                <a href="?viewName=rentList">การเช่า - คืน <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>    
                     <?php if($_SESSION["userType"] == "Admin") { ?>
                            <li>
                                <a href="?viewName=driverList">ข้อมูลคนขับ <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>    
                     <?php if($_SESSION["userType"] == "Admin") { ?>
                            <li>
                                <a href="?viewName=carList">ข้อมูลรถ <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>   
                      <?php if($_SESSION["userType"] == "Admin") { ?>
                            <li>
                                <a href="?viewName=memberList">ข้อมูลลูกค้า <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>
                      <?php if($_SESSION["userType"] == "Admin") { ?>
                            <li>
                                <a href="?viewName=serviceList">ข้อมูลบริการ <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>
                     <?php if($_SESSION["userType"] != "Admin") { ?>
                            <li>
                                <a href="?viewName=mapList">แผนที่ <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>
                     <?php if($_SESSION["userType"] != "Admin") { ?>
                            <li>
                                <a href="?viewName=add_service">เลือกแท๊กซี่ (จอง) <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>
                     <?php if($_SESSION["userType"] != "Admin") { ?>
                            <li>
                                <a href="?viewName=serviceList">ประวัติการใช้บริการ <span class="sr-only">(current)</span></a>
                            </li>
                    <?php } ?>
            </ul>           
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
