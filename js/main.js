$(document).ready(function(){

    function checkUsername() {
        jQuery.ajax({
        url: "inc/processSignUp.php",
        data:'username='+$("#username").val(),
        type: "POST",
        success:function(data){
        $("#checkBlock").html(data);
        },
        error:function (){}
        });
    }

});