
$(document).ready(function () {
    $(".valid").hide();

    var name_err = true;
    var pass_err = true;
    var email_err = true;
    var mob_err = true;
    var add_err = true;

    $("#name").keyup(function () {
        name_check();
    })
    $("#pwd").keyup(function () {
        password_check();
    })
    $("#pwd").keypress(function(e){
        var keycode = e.which;
        if(keycode == 32){
            return false;
        }
    });
     $("#email").keyup(function () {
        email_check();
    })
    $("#email").keypress(function(h){
        var keycode = h.which;
        if(keycode == 32){
            return false;
        }
    })
    
    $("#mob").keyup(function () {
        mob_check();
    })
    $("#mob").keypress(function(h){
        var keycode = h.which;
        if((keycode >= 58) && (keycode <= 125)){
            return false;
        }
    })
    $("#address").keyup(function () {
        add_check();
    })


    function name_check() {
        var name_val = $("#name").val();

        if (name_val.length == '') {
            $("#namecheck").show();
            $("#namecheck").html("*Please fill the name");
            $("#namecheck").focus();
            $("#namecheck").css("color", "red");
            name_err = false;
            return false;
        } else if ((name_val.length < 3) || (name_val.length > 30)) {
            $("#namecheck").show();
            $("#namecheck").html("Name length must be between 3 & 30");
            $("#namecheck").focus();
            $("#namecheck").css("color", "red");
            name_err = false;
            return false;
        }else {
            $("#namecheck").hide();
            name_err = true;
        }
    }

    function password_check() {
        var pass_val = $("#pwd").val();

        if (pass_val.length == '') {
            $("#passcheck").show();
            $("#passcheck").html("*Please fill the password");
            $("#passcheck").focus();
            $("#passcheck").css("color", "red");
            pass_err = false;
            return false;
        }else if ((pass_val.length < "5") || (pass_val.length > "25")) {
            $("#passcheck").show();
            $("#passcheck").html("password length must be between 5 & 25");
            $("#passcheck").focus();
            $("#passcheck").css("color", "red");
            pass_err = false;
            return false;
        }else {
            $("#passcheck").hide();
            pass_err = true;
             }
            }
     function email_check() {
            var email_val = $("#email").val();
    
            if (email_val.length == '') {
                $("#emailcheck").show();
                $("#emailcheck").html("*Please fill the Email");
                $("#emailcheck").focus();
                $("#emailcheck").css("color", "red");
                email_err = false;
                return false;
            } else {
                $("#emailcheck").hide();
                email_err = true;
            }
        }
        function mob_check() {
            var mob_val = $("#mob").val();
    
            if (mob_val.length == '') {
                $("#mobcheck").show();
                $("#mobcheck").html("*Please fill the Mobile Number");
                $("#mobcheck").focus();
                $("#mobcheck").css("color", "red");
                mob_err = false;
                return false;
            } else if (mob_val.length !== 10) {
                $("#mobcheck").show();
                $("#mobcheck").html("Mobile Number must be of 10 digits");
                $("#mobcheck").focus();
                $("#mobcheck").css("color", "red");
                mob_err = false;
                return false;
            } else {
                $("#mobcheck").hide();     
                mob_err = true;           
            }             
        }
        function add_check() {
            var add_val = $("#address").val();
    
            if (add_val.length == '') {
                $("#addcheck").show();
                $("#addcheck").html("*Please fill the add");
                $("#addcheck").focus();
                $("#addcheck").css("color", "red");
                add_err = false;
                return false;
            } else {
                $("#addcheck").hide();
                add_err = true;
            }

        }

    
      $("#form1").on('submit',function(){
        //   e.preventDefault();
        name_check();
        password_check();
        email_check();
        mob_check();
        add_check();

        if((name_err == true) && (pass_err == true) && (email_err == true) && (mob_err == true) && (add_err == true)){
            return true;
        }else{
            return false;
        }
    })
});

