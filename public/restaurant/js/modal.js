document.querySelector('#unique').addEventListener('click',function(e){
    if(e.target.className=='yourStory'){
        var index=parseInt(e.target.nextElementSibling.value);
        // console.log(e.target.parentElement.nextElementSibling)
        setTimeout(() =>{

           document.getElementsByClassName('btn-close')[index].click();
        },3000);
        var i = 0;
        if (i == 0) {
            i = 1;
            var elem = document.getElementsByClassName("myProgress")[index];
            var width = 1;
            var id = setInterval(frame, 30);
            function frame() {
              if (width >= 100) {
                clearInterval(id);
                i = 0;x
              } else {
                width++;
                elem.style.width = width + "%";
              }
            }
          }

    }
})