function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",0)
}
function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function number_card(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{4})(\d{4})(\d{4})(\d{4})/,"$1 $2 $3 $4") //Coloca parênteses em volta dos dois primeiros dígitos
    return v
}

function date_card(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    v=v.replace(/(\d{2})(\d{2})(\d{4})/,"$1-$2-$3") //Coloca parênteses em volta dos dois primeiros dígitos
    return v
}

function cvv_card(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
    return v
}