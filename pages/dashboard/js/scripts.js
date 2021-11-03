var toggleMenu = document.querySelectorAll('.toggleMenu');
var aside = document.querySelector('.aside');
var mainContent = document.querySelector('.mainContent');

for(var i = 0; i < toggleMenu.length; i++){
    toggleMenu[i].addEventListener('click', menuAction);
}
if (window.matchMedia("(min-width: 780px)").matches){
	aside.classList.remove('hide');
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
        mainContent.classList.add('w100');
        mainContent.animate([
            { transform: 'perspective(200px) rotatey(-7deg)' },
            { transform: 'translateX(0)' }
          ], {
            duration: 300,
          });
    }
}

/* LINK ATIVO */
for (var i = 0; i < document.links.length; i++) {
    if (document.links[i].href == document.URL) {
        document.links[i].parentElement.classList.add('active');
    }
}

/* MARCARAR MOEDA */
String.prototype.reverse = function(){
  return this.split('').reverse().join(''); 
};

function mascaraMoeda(campo,evento){
  var tecla = (!evento) ? window.event.keyCode : evento.which;
  var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
  var resultado  = "";
  var mascara = "##.###.###,##".reverse();
  for (var x=0, y=0; x<mascara.length && y<valor.length;) {
    if (mascara.charAt(x) != '#') {
      resultado += mascara.charAt(x);
      x++;
    } else {
      resultado += valor.charAt(y);
      y++;
      x++;
    }
  }
  campo.value = resultado.reverse();
}