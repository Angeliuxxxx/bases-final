let tblUsusarios;
document.addEventListener("DOMContentLoaded", function(){
   tblUsusarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: ''
        },
        columns: [{
            'data' : 'id',
            'data' : 'usuario',
            'data' : 'nombre',
            'data' : 'id_caja'
         }]

    });
})
function frmLogin(e){
    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const clave = document.getElementById("clave");
    if (usuario.value == ""){
        clave.classList.remove("is-invalid");
        usuario.classList.add("is-invalid");
        usuario.focus();
    }else if(clave.value == ""){
        usuario.classList.remove("is-invalid");
        clave.classList.add("is-invalid");
        clave.focus();
    }else{
        const url = base_url + "Usuarios/validar";
        const frm = document.getElementById("frmLogin");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                const res = JSON.parse(this.responseText);
                if (res == "ok"){
                    window.location = base_url + "usuarios";
                }else{
                    document.getElementById("Alerta").classList.remove("d-none");
                    document.getElementById("Alerta").innerHTML=res; 
                }
            }
        }
    }
}