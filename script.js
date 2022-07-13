var nav = document.querySelector('nav');
window.addEventListener('scroll',function(){
    if(this.window.pageYOffset > 750){
        nav.classList.add('bg-dark','shadow');
    }else{
        nav.classList.remove('bg-dark','shadow');
    }
})

$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
  });