(function () {
  var preload = document.getElementById('preload');
  var loading = 0;
  var id = setInterval(frame, 64);

  function frame(){
    if(loading == 80){
      clearInterval(id);
      window.open("previus.php","_self");
    }else {
      loading=loading+1;
      if (loading == 70) {
        preload.style.animation = "fadeout ls ease";
      }
    }
  }
})();
