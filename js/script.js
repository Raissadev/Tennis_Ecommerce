var toggleMenu = document.querySelectorAll('.toggleMenu');
var aside = document.querySelector('.aside');

for(var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
}

function menuAction(){
    if(aside.classList.contains('hide')){
        aside.classList.remove('hide');
        aside.animate([
            { transform: 'translateX(-300px)' },
            { transform: 'translateX(0)' }
          ], {
            duration: 300,
          });
    }else{
        aside.classList.add('hide');
    }
}
/* */

for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].parentElement.classList.add('active');
    }
}
