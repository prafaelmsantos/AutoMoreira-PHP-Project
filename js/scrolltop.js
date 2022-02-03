

/* scrolltotop */
function scrollToTop(){
    document.documentElement.scrollTop = 0;
    document.body.scrollTop = 0;
}

/* */
window.onscroll = function(){
    btn = document.getElementById('btn-scroll-top');
  
    
    if(document.documentElement.scrollTop > 200 || document.body.scrollTop > 200 ){
        /*btn.style.display = 'block';*/
        btn.style.opacity = 1;
    }
    else{
        /*btn.style.display = 'none';*/
        btn.style.opacity = 0;
    }

}
