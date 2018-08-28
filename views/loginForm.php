<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="dist/main.css" >
<script src="dist/bundle.js" type="text/javascript"></script>
<title>User Login</title>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4 offset-md-4">
            <h3 class="center">Login Module</h3>
            <div style="color:red;"><?php echo $this->message; ?></div>
            <form name="user_login_form" class="login-form" method="post" action="index.php">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" maxlength="20" class="form-control username" required
                    id="username" placeholder="Enter username" value="<?php echo $this->username; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" class="form-control password" required 
                    id="password" placeholder="Enter password" value="<?php echo $this->password; ?>">
                </div>
                <div class="form-group text-center">
                    <input name="action" value="Login" type="submit" class="btn btn-light submit" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>