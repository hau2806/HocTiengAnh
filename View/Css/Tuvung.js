$(document).ready(function() {
    demNguoc();
    mark();
    
});
function demNguoc()
{
    // Set the date we're counting down to
  var now = new Date().getTime();
  var countDownDate = now+1801000;

// Update the count down every 1 second

var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
  //Find the distance between now and the count down date
  var distance = countDownDate - now;

  //Time calculations for days, hours, minutes and seconds
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  //Output the result in an element with id="demo"
  document.getElementById("clock").innerHTML = hours + "h "
  + minutes + "m " + seconds + "s ";
    
  //If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
      window.location = " http://localhost/HOCTIENGANH";
    }
  }, 1000);
}
function mark(){
    $('.question a').click(function(e){
        e.preventDefault();
        var contentId = $(this).attr('href');
        $getString = contentId;
        $getId = $getString.slice(5, );
        var nameId = "question_mark"+$getId;
        if ($(contentId).hasClass('red')) {
            $(contentId).removeClass('red');
            $(contentId).addClass('color-none');
            $('#'+nameId).addClass('bg-none');
            $('#'+nameId).removeClass('bg-red');
        } else {
            $(contentId).removeClass('color-none');
            $(contentId).addClass('red');
            $('#'+nameId).addClass('bg-red');
            $('#'+nameId).removeClass('bg-none');
        }
        
    });
}
