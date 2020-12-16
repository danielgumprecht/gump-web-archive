let max = 0;
let ids = [];
window.onload = function(){
    */setInterval(function(){
        max = getNumbers();
    }, 10000);*/
}

window.onload = setNew();

window.onload = function(){
    let btn1 = document.getElementById("btn1");
    let btn2 = document.getElementById("btn2");

    btn1.onclick = function(){
        sendBest(ids[0]);
        setNew();
    }

    btn1.onclick = function(){
        sendBest(ids[1]);
        setNew();
    }

}

function setNew(){
    let img = randomCheck();
    ids[0] = img[0];
    ids[1] = img[1];

    document.getElementById("image1").innerHTML = '<img src="../images/'+ids[0]+'.jpg" width="200" height="200" style="border-radius: 20px">';
    document.getElementById("image2").innerHTML = '<img src="../images/'+ids[1]+'.jpg" width="200" height="200" style="border-radius: 20px">';
}

function sendBest(data){
    $.ajax({
        url: "../backend/updateRank.php",
        dataType: "json",
        data: {"id": data},
        success: function(response){
            console.log(response.status);
        }
    })
}


function getNumbers(){
    $.ajax({
        url: "../backend/getnumbers.php",
        dataType: "json",
        data: {"request": true},
        success: function(response){
            if(response.status == true) {
                return response.max;
            }
        }
    })
}

function randomCheck() {
    let rand = randomNumbers();
    while(rand[0] == rand[1]){
        rand = randomNumbers();
    }
    return rand;
}

function randomNumbers(){
    let output = [];
    output[0] = Math.floor(Math.random()*max);
    output[1] = Math.floor(Math.random()*max);
    return output;
}