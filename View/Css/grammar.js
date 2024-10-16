$("#nav-mobile-icon").addClass("none");


none_user = function(){
    window.location = " http://localhost/HOCTIENGANH/?action=login";
}

$( window ).resize(function(e) {
    var newWidth = $( window ).width();
    if(newWidth>600){
        $("#nav-mobile-icon").addClass("none");
        $("#nav-mobile-icon").removeClass("bl");
        $(".topnav").addClass("bl");
        $(".topnav").removeClass("none");
    }else{
        $("#nav-mobile-icon").addClass("bl");
        $("#nav-mobile-icon").removeClass("none");
        $(".topnav").addClass("none");
        $(".topnav").removeClass("bl");
    }
});
$(".mobile-nav-icon").click(function(){
    $(".topnav").slideToggle(200);
    if($(".mobile-nav-icon").hasClass("fa fa-bars")){
       $(".mobile-nav-icon").removeClass("fa fa-bars");
       $(".mobile-nav-icon").addClass("fa fa-times");
    }else{
       $(".mobile-nav-icon").removeClass("fa fa-times");
       $(".mobile-nav-icon").addClass("fa fa-bars");
    }
});
