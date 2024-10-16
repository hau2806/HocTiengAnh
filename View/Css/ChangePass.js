function ok(){
    var k = document.getElementById("ok");
    k= confirm("Are you sure?");
    if(k){
        window.location = " http://localhost:81/HOCTIENGANH/?action=tuvung";
    }
}