<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="dist/main.css" >
<script src="dist/bundle.js" type="text/javascript"></script>
<title>User Profile</title>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 offset-md-3">
            <h3 class="center">User Profile</h3>
            <form method="post" name="logout_user">
            <div class="row">
                <div class="col-sm-6">Welcome <?php echo $_SESSION['username'] ?></div>
                <div class="col-sm-6 text-right"><input type="submit" name="action" value="Logout" class="btn btn-light" /></div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>