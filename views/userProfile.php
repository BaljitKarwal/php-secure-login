<!DOCTYPE html>
<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<title>User Profile</title>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <h3 class="center">User Profile</h3>
            <form method="post" name="logout_user">
            <div class="row">
                <div class="col-xs-6">Welcome <?php echo $_SESSION['username'] ?></div>
                <div class="col-xs-6 text-right"><input type="submit" name="action" value="Logout" /></div>
            </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>