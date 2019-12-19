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


    $('.tablinks').click(function(){

        if($('#signin').hasClass('active')){
            $('body').animate({ backgroundColor: '#958adb'}, 1000);
            $('#signup input').animate({ backgroundColor: '#958adb'}, 1000);
            $('#signin, #signup').animate({ backgroundColor: '#7A71B5'}, 1000);
            $('#content,label').animate({ color: '#c5eae5'}, 750);
        }

        if($('#signup').hasClass('active')){
            $('body').animate({ backgroundColor:'#c5eae5'}, 1000);
            $('#signin input').animate({ backgroundColor:'#c5eae5'}, 1000);
            $('#signin, #signup').animate({ backgroundColor: '#CFF8F2'}, 1000);
            $('#content,label').animate({ color: '#958adb'}, 750);
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