$(document).ready(function(){ 


    $('#signinbtn').click(function(){

        $("#signup").removeClass("active");
        $("#signupbtn").removeClass("active");

        $('#signin').addClass("active");   
        $("#signinbtn").addClass("active");

    });

    $('#signupbtn').click(function(){

        $("#signin").removeClass("active");
        $("#signinbtn").removeClass("active");

        $('#signup').addClass("active");   
        $("#signupbtn").addClass("active");


            // Adjust dropdown size
        $("#country").width($("#firstname").width());
        $("#country").height($("#firstname").height());
        $("#phone").width($("#firstname").width());
    });


    var transitionDelay = 900;

    $('.tablinks').click(function(){

        if($('#signin').hasClass('active')){
            $('body').animate({ backgroundColor: '#958adb'}, transitionDelay);
            $('input, select').animate({ backgroundColor: '#c5eae5'}, transitionDelay);
            $('#signin, #signup').animate({ backgroundColor: '#7A71B5'}, transitionDelay);
            $('#content,label,forgotpasword,[name="signup"]').animate({ color: '#c5eae5'}, transitionDelay);
        }

        if($('#signup').hasClass('active')){
            $('body').animate({ backgroundColor:'#c5eae5'}, transitionDelay);
            $('input, select').animate({ backgroundColor:'#958adb'}, transitionDelay);
            $('#signin, #signup').animate({ backgroundColor: '#CFF8F2'}, transitionDelay);
            $('#content,label,forgotpassword,[name="signin"]').animate({ color: '#958adb'}, transitionDelay);
        }

    });
        // Change initial displayed form
    if($("#signinbtn").hasClass("active")){
        $("#signinbtn").trigger("click");
    }
    else{
        $("#signupbtn").trigger("click");
    }



});