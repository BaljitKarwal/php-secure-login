import $ from 'jquery';

var CryptoJS = require("crypto-js");

$(document).ready(function() {

    var encrypt = function(message){

        var key = CryptoJS.enc.Hex.parse("0123456789abcdef0123456789abcdef");
        var iv = CryptoJS.enc.Hex.parse("abcdef9876543210abcdef9876543210");

        var encrypted = CryptoJS.AES.encrypt(message, key, {
            iv,
            padding: CryptoJS.pad.ZeroPadding,
        });

        return encrypted.toString();

    }
    var form = $('.login-form');  
    $(form).submit(function() {
        var password = form.find('.password').val();
        password = encrypt(password);
        $(".password").val(password);
        return true;
    });
  
});