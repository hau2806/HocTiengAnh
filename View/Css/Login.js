$(document).ready(
	function(){
        showPass();
    }
);
function showPass(){
    var pass = document.getElementById("passw");
    
    $('.eye').addClass('disin');
    $('.eye-off').addClass('disnone');
    $('.eye').click(function(e){
        e.preventDefault();
        if (pass.type === "password") {
            pass.type = "text";
        }
        $('.eye-off').addClass('disin');
        $('.eye-off').removeClass('disnone');
        $('.eye').addClass('disnone');
        $('.eye').removerClass('disin');
    });
    $('.eye-off').click(function(e){
        e.preventDefault();
        if (pass.type === "text") {
            pass.type = "password";
        }
        $('.eye').addClass('disin');
        $('.eye').removeClass('disnone');
        $('.eye-off').addClass('disnone');
        $('.eye-off').removeClass('disin');
    });
}
