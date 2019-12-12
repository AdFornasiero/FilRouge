$(document).ready(function(){ 


    $('#country').css('width', $('#phone').width());

    $('#signinbtn').click(function(){

        $("#signup").css("display","none");
        $("#signupbtn").removeClass("active");
        $('#signin').css("display","block");   
        $("#signinbtn").addClass("active");

    });

    $('#signupbtn').click(function(){

        $("#signin").css("display","none");
        $("#signinbtn").removeClass("active");
        $('#signup').css("display","block");   
        $("#signupbtn").addClass("active");

    });

});