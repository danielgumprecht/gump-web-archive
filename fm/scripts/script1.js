let id = [];
window.onload = loadnewcontent("nothing");
window.onload = function(){
    let btn1 = document.getElementById("btn1");
    let btn2 = document.getElementById("btn2");

    btn1.onclick= function() {
        loadnewcontent(id[0]);
    }

    btn2.onclick = function() {
        loadnewcontent(id[1]);
    }
}

function loadnewcontent(identifier){
    $.ajax({
       url: "backend/facemash/facemash.php",
       dataType: "json",
       data: {"id": identifier} ,
        success: function(response){
            document.getElementById("image1").innerHTML = '<img src="images/'+response.img1+'.jpg" width="200" height="200" style="border-radius: 20px">';
            document.getElementById("image2").innerHTML = '<img src="images/'+response.img2+'.jpg" width="200" height="200" style="border-radius: 20px">';
            id[0] = response.img1;
            id[1] = response.img2;
        }
    });

}

var eventHandler = function (event) {
    // Only run for iOS full screen apps
    if (('standalone' in window.navigator) && window.navigator.standalone) {
        // Only run if link is an anchor and points to the current page
        if ( event.target.tagName.toLowerCase() !== 'a' || event.target.hostname !== window.location.hostname || event.target.pathname !== window.location.pathname || !/#/.test(event.target.href) ) return;

        // Open link in same tab
        event.preventDefault();
        window.location = event.target.href;
    }
}
window.addEventListener('click', eventHandler, false);