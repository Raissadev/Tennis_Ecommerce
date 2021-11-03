var actionForm = document.querySelectorAll('.buttonOpenForm');
var form = document.querySelector('.formContainer');
var footer = document.querySelector('footer');

for(var i = 0; i < actionForm.length; i++){
    actionForm[i].addEventListener('click', formAction);
}

function formAction(){
    if(form.classList.contains('hide')){
        form.classList.remove('hide');
        footer.classList.add('hide');
        form.animate([
            { transform: 'translateY(0px)' },
            { transform: 'translateY(30vh)' }
          ], {
            duration: 300,
          });
    }else{
        form.classList.add('hide');
        footer.classList.remove('hide');
    }
}

/* */

