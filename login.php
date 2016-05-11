<!doctype>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
				background: url('images/bg1.jpg') no-repeat center center fixed;
				-moz-background-size: cover;
				-webkit-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin .checkbox {
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>
    </head>
    <body>
    <div class="row">
    	<div class="col-md-12">
   		  <h3 class="form-signin-heading" style="margin-left:35px;text-align:center;color:#333"; ><label class="">ระบบคลังสินค้าผลิตภัณฑ์เสริมอาหาร</label>
                <br /><br />
   		    <img src="images/1.1.png" width="350" height="250"></h3>
                <br />
        </div>
    </div>
        <div class="container">
            <form class="form-signin" method="post" action="checkLogin.php">               
                <label for="inputEmail" class="sr-only">ชื่อผู้ใช้</label>
                <input type="username" name="username" id="inputEmail" class="form-control" placeholder="พิมพ์ชื่อผู้ใช้งาน" required="" autofocus="">  <br />
                <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="พิมพ์รหัสผ่าน" required="">
                <button class="btn btn-lg btn-success btn-block" type="submit">เข้าสู่ระบบ</button>
            </form>

        </div>
    </body>
</html>