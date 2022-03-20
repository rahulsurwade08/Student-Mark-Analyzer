<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>
<meta name="viewport" content="width=device-width , initial-scale=1.0">
<title>Login</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/Style.css" rel="stylesheet">
</head>

<body style="background-image:url('Images/cropped-1366-768-320144.jpg')">

<div class=" panel-img">
<img src="Images/Panel.png" alt="" />
</div>

      	<!-- User Login Panel Start Here -->
		<div>
			<div style="position: absolute; z-index: 1" id="layer2" ><div class="modal-body" style="margin:30px 0px 0px 550px">
              <div class="row">
                  <div class="col-xs-16">
                      <div>
												<h1><center>LOGIN</center></h1>
                          <form id="loginForm" method="POST" action="connect.php" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="" required="" title="Please Enter You Username" placeholder="example@gmail.com" required>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" value="" required="" title="Please Enter Your Password" placeholder="Password" required>
                                  <span class="help-block"></span>
                              </div>



                              <button type="submit" class="btn btn-success btn-block">Login</button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<!-- User Login Form End Here -->

<!-- <button class="btn navbar-btn btn-info" type="button">New Account</button><span class="sr-only">(current)</span> -->



<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


</body>

</html>
