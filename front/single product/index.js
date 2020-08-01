
$(".show-number").click(function(){
  $("#phone-text").text("09141414");
});

var count = 0;

function changeImage() {

        count++;

        if(count%2 == 0)
        {
          document.getElementById("fav-img").src = "images/like-empty.png";
        }
        else
        {
          document.getElementById("fav-img").src = "images/like-fill.png";
        }
   }
