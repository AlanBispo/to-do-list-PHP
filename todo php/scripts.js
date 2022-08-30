const validaForm = () => {
    if(document.getElementById("input").value.length === 0 
    || document.getElementById("select").value === "" ){
    alert('Por favor, preencha todos os campos!');
    document.getElementById("input").focus();
    return false
    }
}