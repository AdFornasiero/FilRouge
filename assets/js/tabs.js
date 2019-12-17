$(document).ready(function(){ 


    $('#signinbtn').click(function(){

        $("#signup").removeClass("active");
        $("#signupbtn").removeClass("active");

        $('#signin').addClass("active");   
        $("#signinbtn").addClass("active");
       // $("body").css("background-color", "blue");

    });

    $('#signupbtn').click(function(){

        $("#signin").removeClass("active");
        $("#signinbtn").removeClass("active");

        $('#signup').addClass("active");   
        $("#signupbtn").addClass("active");
        //$("body").css("background-color", "purple");


            // Adjust dropdown size
        $("#country").width($("#firstname").width());
        $("#country").height($("#firstname").height());
        $("#phone").width($("#firstname").width());
    });


        // Change initial displayed form
    if($("#signinbtn").hasClass("active")){
        $("#signinbtn").trigger("click");
    }
    else{
        $("#signupbtn").trigger("click");
    }

});