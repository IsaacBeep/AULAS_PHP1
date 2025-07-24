// EXECUTAR MASCARAS
function mascara(o,f) //define o objeto e chama a função
{
    objeto=o 
    funcao=f 
    setTimeout("executaMascara()",1)
}

function executaMascara() {
    objeto.value=funcao(objeto.value)
}

//mascaras
//telefone
function telefone(variavel){
    variavel=variavel.replace(/\D/g,"")
    variavel=variavel.replace(/^(\d\d)(\d)/g,"($1) $2") //adiciona parenteses em volta dos dois primairos digitos
    variavel=variavel.replace(/(\d{5})(\d)/,"$1-$2") //adiciona o hifem entre o quarto e o quinto digito
    return variavel
}

//CEP
function cep(variavel){
    variavel=variavel.replace(/\D/g,"") //remove caracteres não numericas
    variavel=variavel.replace(/(\d{5})(\d)/,"$1-$2") //adiciona o hifem entre o quinto e o sexto digito
    return variavel
}

//data
function data(variavel){
    variavel=variavel.replace(/\D/g,"") //remove caracteres não numericas
    variavel=variavel.replace(/(\d{2})(\d)/,"$1/$2") //adiciona a barra entre o segundo e o terceiro digito
    variavel=variavel.replace(/(\d{2})(\d)/,"$1/$2") //adiciona a barra entre o quarto e o quinto digito
    return variavel
}

//NOME
function nome(variavel) {
    variavel = variavel.replace(/[^a-zA-ZÀ-ÿ\s]/g, "");
    variavel = variavel.replace(/\s+/g, " ").trim();
    return variavel;
}
