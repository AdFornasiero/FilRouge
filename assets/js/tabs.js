$(document).ready(function(){ 

    $('#signinbtn').click(function(){

        $("#signup").css("display","none");
        $("#signupbtn").removeClass("active");
        $('#signin').css("display","block");   
        $("#signinbtn").addClass("active");
       // $("body").css("background-color", "blue");


    });

    $('#signupbtn').click(function(){

        $("#signin").css("display","none");
        $("#signinbtn").removeClass("active");
        $('#signup').css("display","block");   
        $("#signupbtn").addClass("active");
        //$("body").css("background-color", "purple");


    });


    //$("#country").width($('#phone').width());
    $("#signupbtn").trigger("click");
});