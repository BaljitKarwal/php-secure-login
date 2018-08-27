<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>User Login</title>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <h3 class="center">Login Module</h3>
            <div style="color:red;"><?php echo $this->message; ?></div>
            <form name="user_login_form" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input name="username" type="text" maxlength="20" class="form-control" required
                    id="username" placeholder="Enter username" value="<?php echo $this->username; ?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="password" type="password" maxlength="20" class="form-control" required 
                    id="password" placeholder="Enter password" value="<?php echo $this->password; ?>">
                </div>
                <div class="form-group">
                    <input name="action" value="Login" type="submit" class="form-control" id="submit">
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>