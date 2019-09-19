<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id = "main-container">
    <table class="table">
        <thead >
        <tr style="background-color: #ffffff !important; border-top-style: none !important; ">
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            <?php
            if (count($users) > 0) {
                foreach ($users as $user) {
                    ?>
                    <tr>
                        <td ><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['surname'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <button onclick="delete_user(<?=$user['id']?>);" class="btn pill" style="float: right; width: 130px; margin: 0px !important; margin-right: 60px !important;  background-color: #FF0031; color: white;">Delete</button>
                            <button onclick="edit_user(<?=$user['id']?>);"  class="btn pill" style="float: right; width: 130px; margin: 0px !important; margin-right: 10px !important; background-color: #00DF2D; color: white;">Edit</button>

                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>
<div class="modal-container" >

</div>
<script>


    function edit_user(id) {
        $.ajax({
            url: "/index.php/user/load_edit_user",
            type: 'POST',
            data: {
                id: id
            },
            success: function(response){
                // Add response in Modal body
                $('.modal-container').html(response);

                // Display Modal
                $('#myModal').modal('show');
            }
        });
    }

    function delete_user(id) {
        bootbox.confirm({
            message: "Are you sure you want to delete this user?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result === true){
                    $.ajax({
                        type: "POST",
                        url: "/index.php/user/delete_user",
                        data:{
                            id		: id,
                        },
                        success: function(data){
                            if('response' ==  'ok'){
                                bootbox.alert("User deleted successfully")
                            }
                            window.location.reload(true);
                        },
                        error: function(err) {
                            bootbox.alert('oops, something went wrong!');
                        }
                    });
                }
            }
        });

    }
</script>
