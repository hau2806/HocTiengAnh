let stars =  document.getElementById('stars');
let moon =  document.getElementById('moon');
let mountains_behind =  document.getElementById('mountains_behind');
let mountains_front =  document.getElementById('mountains_front');
let text = document.getElementById('text');
let btn = document.getElementById('btn');
let colum = document.getElementsByClassName('col');
let header = document.querySelector('header');
let mybutton = document.getElementById("myBtn");
let img_quote = document.getElementsByClassName('img-quote');
let q_quote = document.getElementsByClassName('q');
var sticky = header.offsetTop;
$("#nav-mobile-icon").addClass("none");

window.addEventListener('scroll', function(){
    let value= window.scrollY;
    console.log(value);
    stars.style.left = value * 0.25 + 'px';
    moon.style.top = value * 1.05 + 'px';
    mountains_behind.style.top = value * 0.5 + 'px';
    mountains_front.style.top = value * 0 + 'px';
    text.style.marginRight = value * 4 + 'px';
    text.style.marginTop = value * 1.5 + 'px';
    btn.style.marginTop = value * 1.5 + 'px';
    header.classList.add("sticky");
    if(value > 60){
        $('.course-top').addClass("backInUp");
    }else{
        $('.course-top').removeClass("backInUp");
    }
    if(value > 950){
        $('.quote-top').addClass("rollIn");
    }else{
        $('.quote-top').removeClass("rollIn");
    }
    if(value > 1300){
        $('.img-quote').addClass("zoomIn");
    }else{
        $('.img-quote').removeClass("zoomIn");
    }
    
    if(value > 280){
        header.style.backgroundColor = '#29323c';
        header.style.padding ="10px 15px 15px 10px";
        mybutton.classList.add('animation');
    } else {
        header.style.backgroundColor = 'rgba(31, 30, 30, 0.24)';
        header.style.padding ="15px 100px 50px 100px";
        mybutton.classList.remove('animation');
    }

    if(value < 340 || value > 1260){
        for(let i=0; i<colum.length ;i++){
            colum[i].style.opacity = '0.2';
        }
    } else {
        for(let i=0; i<colum.length ;i++){
            colum[i].style.opacity = '1';
        }
    }

    // if(value > 1520 && value < 2200){
    //     for(let i=0; i<img_quote.length ;i++){
    //         img_quote[i].classList.add('quotestyles');
    //         img_quote[i].classList.remove('unquotestyles');
    //     }
    //     for(let i=0; i<q_quote.length ;i++){
    //         q_quote[i].classList.add('q_quotestyles');
    //         q_quote[i].classList.remove('q_unquotestyles');
    //     }
    // }else{
    //     for(let i=0; i<img_quote.length ;i++){
    //         img_quote[i].classList.add('unquotestyles');
    //         img_quote[i].classList.remove('quotestyles');
    //     }
    //     for(let i=0; i<q_quote.length ;i++){
    //         q_quote[i].classList.remove('q_quotestyles');
    //         q_quote[i].classList.add('q_unquotestyles');
    //     }
    // }

});

/* Slider quote */
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

/* Back to top */
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

none_user = function(){
    window.location = " http://localhost/HOCTIENGANH/?action=login";
}

$( window ).resize(function(e) {
    var newWidth = $( window ).width();
    if(newWidth>1024){
        $("#nav-mobile-icon").addClass("none");
        $("#nav-mobile-icon").removeClass("bl");
        $(".topnav").addClass("bl");
        $(".topnav").removeClass("none");
        window.addEventListener('scroll', function(){
            let value= window.scrollY;
            if(value > 280){
                header.style.backgroundColor = '#29323c';
                header.style.padding ="10px 15px 15px 10px";
                mybutton.classList.add('animation');
            } else {
                header.style.backgroundColor = 'rgba(31, 30, 30, 0.24)';
                header.style.padding ="15px 100px 50px 100px";
                mybutton.classList.remove('animation');
            }
            if(value > 400){
                $('.quote-top').addClass("rollIn");
            } else {
                $('.quote-top').removeClass("rollIn");
            }
            if(value < 340 || value > 1260){
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '0.2';
                }
            } else {
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '1';
                }
            }        
        });        
    }else if(newWidth>600){
        $("#nav-mobile-icon").addClass("none");
        $("#nav-mobile-icon").removeClass("bl");
        $(".topnav").addClass("bl");
        $(".topnav").removeClass("none");
        header.style.padding ="10px 15px 15px 10px";
        window.addEventListener('scroll', function(){
            let value= window.scrollY;
            stars.style.left = value * 0.25 + 'px';
            moon.style.top = value * 1.05 + 'px';
            mountains_behind.style.top = value * 0.5 + 'px';
            mountains_front.style.top = value * 0 + 'px';
            text.style.marginRight = value * 4 + 'px';
            text.style.marginTop = value * 1.5 + 'px';
            btn.style.marginTop = value * 1.5 + 'px';
            header.classList.add("sticky");
            if(value > 280){
                header.style.backgroundColor = '#29323c';
                header.style.padding ="10px 15px 15px 10px";
                mybutton.classList.add('animation');
            } else {
                header.style.backgroundColor = 'rgba(31, 30, 30, 0.24)';
                header.style.padding ="10px 15px 15px 10px";
                mybutton.classList.remove('animation');
            }
            if(value > 650){
                $('.quote-top').addClass("rollIn");
            } else {
                $('.quote-top').removeClass("rollIn");
            }

            if(value > 1100){
                $('.img-quote').addClass("zoomIn");
            }else{
                $('.img-quote').removeClass("zoomIn");
            }
            if(value < 340 || value > 1260){
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '0.2';
                }
            } else {
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '1';
                }
            }        
        });
    }else{
        $("#nav-mobile-icon").addClass("bl");
        $("#nav-mobile-icon").removeClass("none");
        $(".topnav").addClass("none");
        $(".topnav").removeClass("bl");
        window.addEventListener('scroll', function(){
            let value= window.scrollY;
            if(value > 280){
                header.style.backgroundColor = '#29323c';
                header.style.padding ="10px 15px 15px 10px";
                mybutton.classList.add('animation');
            } else {
                header.style.backgroundColor = 'rgba(31, 30, 30, 0.24)';
                header.style.padding ="10px 15px 15px 10px";
                mybutton.classList.remove('animation');
            }
            if(value < 340 || value > 2400){
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '0.2';
                }
            } else {
                for(let i=0; i<colum.length ;i++){
                    colum[i].style.opacity = '1';
                }
            }     
        });
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
