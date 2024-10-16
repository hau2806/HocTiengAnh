// var index = 0;
// ok = function(){
// 	var name = ["Giang","a trainee at AHT","a student at ICTU"];
//     let getName = document.getElementById('slide');
//     getName.innerHTML = name[index];
//     index++;
//     if(index==3){
//     	index=0;
//     }
// }
// setInterval(ok,3000);
$(document).ready(
	function(){
        $('#home').addClass("visible");
        $('#contact').addClass("hidden");
        $('#highscore').addClass("hidden");
        rehome();
        gocontact();
        gohighscore();
        myMap();
    }
);
const hieu_ung_danh_chu = function (the_html_chua_chu, chu, thoiGianDoi) {
    this.the_html_chua_chu = the_html_chua_chu;
    this.chu = chu;
    this.tu = '';
    this.vi_tri_index_chu = 0;
    this.thoiGianDoi = parseInt(thoiGianDoi, 10);
    this.ham_danh_chu();
    this.dang_xoa_chu = false;
}

hieu_ung_danh_chu.prototype.ham_danh_chu = function() {
    
    // Vị Trí chỉ mục của từ hiện tại
    const index_chu_hien_tai = this.vi_tri_index_chu % this.chu.length;
    //Lấy tất cả cả từ của chữ hiện tại
    const chu_hien_tai = this.chu[index_chu_hien_tai]
    if(this.dang_xoa_chu) {
        this.tu = chu_hien_tai.substring(0, this.tu.length - 1)
    } else {
        this.tu = chu_hien_tai.substring(0, this.tu.length + 1)
    }

    
    this.the_html_chua_chu.innerHTML = `<span class="tu">${this.tu}</span>`


    let toc_do_danh_chu = 200;
    if(this.dang_xoa_chu) {
        toc_do_danh_chu = toc_do_danh_chu /2
    }


    if(!this.dang_xoa_chu && this.tu === chu_hien_tai) {
        toc_do_danh_chu = this.thoiGianDoi;
        console.log(this.thoiGianDoi)
        this.dang_xoa_chu = true;
    } else if (this.dang_xoa_chu && this.tu === ''){
        this.dang_xoa_chu = false;
        this.vi_tri_index_chu++;
        toc_do_danh_chu = 200
    }

    setTimeout(() => this.ham_danh_chu(), toc_do_danh_chu)
}

document.addEventListener('DOMContentLoaded', chay_ham);

function chay_ham() {
    const the_html_chua_chu = document.querySelector('.danh_chu');
    const chu = JSON.parse(the_html_chua_chu.getAttribute('data-chu'));
    const thoiGianDoi = the_html_chua_chu.getAttribute('data-thoiGianDoi');

    //Thiết Lập hàm hieu_ung _danh_chu
    new hieu_ung_danh_chu(the_html_chua_chu, chu, thoiGianDoi)
}

accept = function(){
    var ok = confirm("Are you sure?");
    if(ok){
        window.location = "http://localhost:81/HOCTIENGANH/?action=tuvung";
    }
}
accept1 = function(){
    var ok = confirm("Are you sure?");
    if(ok){
        window.location = "http://localhost:81/HOCTIENGANH/?action=nghe";
    }
}
accept2 = function(){
    var ok = confirm("Are you sure?");
    if(ok){
        window.location = "http://localhost:81/HOCTIENGANH/?action=nguphap";
    }
}
none_user = function(){
    window.location = " http://localhost:81/HOCTIENGANH/?action=login";
}

var home = document.getElementById("home");

function rehome(){
    $('#re-home').click(function(e){
        e.preventDefault();
        $('#home').addClass("visible");
        $('#home').removeClass("hidden");
        $('#highscore').addClass("hidden");
        $('#highscore').removeClass("visible");
        $('#contact').addClass("hidden");
        $('#contact').removeClass("visible");
    });
}
function gocontact(){
    $('#go-contact').click(function(e){
        e.preventDefault();
        $('#home').addClass("hidden");
        $('#home').removeClass("visible");
        $('#highscore').addClass("hidden");
        $('#highscore').removeClass("visible");
        $('#contact').addClass("visible");
        $('#contact').removeClass("hidden");
    });
}
function gohighscore(){
    $('#go-high').click(function(e){
        e.preventDefault();
        $('#home').addClass("hidden");
        $('#home').removeClass("visible");
        $('#highscore').addClass("visible");
        $('#highscore').removeClass("hidden");
        $('#contact').addClass("hidden");
        $('#contact').removeClass("visible");
    }); 
}
function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(21.336433,106.8444837),
      zoom:5,
    };
    var map = new google.maps.Map(document.getElementById("content-contact"),mapProp);
    // var marker = new google.maps.Marker({
    //     center:new google.maps.LatLng(21.336433,106.8444837),
    //     animation:google.maps.Animation.BOUNCE
    //   });
      
    // marker.setMap(map);
    // var infowindow = new google.maps.InfoWindow({
    //     content:"Hello World!"
    //   });
      
    // infowindow.open(map,marker);
}


