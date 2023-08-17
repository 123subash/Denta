var images =['img1.jpg','img2.jpg','img3.jpg','img4.jpg'];
          
var x = 0;
var imgs = document.getElementById('img');
//The setInterval() calls a function at theintervals (in milliseconds). 
setInterval(slider, 3000);

function slider() {

  if (x < images.length) 
    {
    x = x + 1;
    } 

  else 
    {
    x = 1;
    }


  imgs.innerHTML = "<img src=" + "../images/" + images[x - 1] + ">";
}