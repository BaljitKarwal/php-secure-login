#PHP Secure login script
A simple secure php script is using sqlite file with sample login data.
Script checks PHP version and allows to run only if php version is 5.6 or more. 
Uses PDO.
Uses Webpack and node modules.
Implements basic bootstrap 4 to display form fields.
Displays User login form and user's welcome screen with Logout button upon logged in with welcome message.
Validates form fields on server side as well as client side.
Session usage for user logged in.
Frontend password encryption and decryption (openssl_decrypt) at server side supporting php version 7 as well.

##Installation
- Add project to server
- Run _install.php at project root. This will create database file users.db at root with sample login data.
- Run "npm install"
- Run "npm run build"

##Requirements - getting installed by npm and webpack
- jQuery
- Bootstrap 4
- node modules
- crypto-js

##Sample data to login
- Username: test
- Password: test123

