<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id = "main-container" >
    <div class="row <?= isset($is_modal)?'':'form-container'?>" >
        <form class="<?= isset($is_modal)?'col-md-8 ':'col-md-4 '?> " style="margin :15%; ">

            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" value="<?= !empty($user['first_name'])?$user['first_name']:''?>" >
            </div>

            <div class="form-group">
                <label for="surname">Last Name</label>
                <input type="text" class="form-control" id="surname" value="<?= !empty($user['surname'])?$user['surname']:''?>">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" value="<?= !empty($user['email'])?$user['email']:''?>">
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="<?= !empty($user['username'])?$user['username']:''?>">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" value="<?= !empty($user['password'])?$user['password']:''?>" >
            </div>
            <a href="#" onclick="check_form();" class="btn pill " style="float: right; background-color: #00DF2D; color: white;">SUBMIT</a>
            <div class="alert alert-danger error-class" style="display:none; margin-top: 80px;" role="alert">
                Please check your entry,fields with errors are highlighted in red
            </div>
            <div class="alert alert-success success-class" style="display: none;"  role="alert">
                Your submission has been successful
            </div>
        </form>
    </div>
</div>

<script>

    $( document ).ready(function() {
        $('.success-class').hide();
        $('.error-class').hide();
    });


    function check_form(){

        var form_valid = true;
        //validate empty
        if(isBlank($('#first_name').val())){
            form_valid = false;
            $('#first_name').addClass('is-invalid');
        }else{
            $('#first_name').removeClass('is-invalid');
        }
        
        
        if(isBlank($('#surname').val())){
            form_valid = false;
            $('#surname').addClass('is-invalid');
        }else{
            $('#surname').removeClass('is-invalid');
        }


        if(isBlank($('#email').val())){
            form_valid = false;
            $('#email').addClass('is-invalid');
        }else{
            $('#email').removeClass('is-invalid');
        }

        if(isBlank($('#username').val())){
            form_valid = false;
            $('#username').addClass('is-invalid');
        }else{
            $('#username').removeClass('is-invalid');
        }

        if(isBlank($('#password').val())){
            form_valid = false;
            $('#password').addClass('is-invalid');
        }else{
            $('#password').removeClass('is-invalid');
        }

        if(form_valid === true){
            post_form();
        }else{
            $('.success-class').hide();
            $('.error-class').show();
        }
    }

    function post_form(){
        $.ajax({
            type: "POST",
            url: "/index.php/user/add_user",
            data:{

                id		        : '<?= isset($user['id']) ? $user['id'] : 0 ?>',
                first_name		: $('#first_name').val(),
                surname		    : $('#surname').val(),
                email		    : $('#email').val(),
                username		: $('#username').val(),
                password		: $('#password').val(),

            },
            success: function(data){
                //response
                $('.success-class').show();
                $('.error-class').hide();


                window.location.reload(true);
            },
            error: function(err) {
                $('.success-class').hide();
                $('.error-class').show();
            }
        });
    }

    function isBlank(str) {
        return (!str || /^\s*$/.test(str));
    }
</script>