const botones = document.querySelectorAll(".btnEliminar");

botones.forEach(boton => {
    boton.addEventListener("click", function(){
        const id = this.dataset.id;
        
        const confirm = window.confirm("¿Esta seguro que desea eliminar el registro?");
        if (confirm) {
            //solicitud AJAX
            httpRequest("http://localhost/mvc/consulta/eliminar/" + id, function(){
                document.querySelector("#respuesta").innerHTML = this.responseText;

                const tbody = document.querySelector("#tbody-producto-tipo");
                const fila = document.querySelector("#fila-" + id);
                
                tbody.removeChild(fila); 
            });
        }
    });
});

function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();

    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(http);
        }
    }
}

function mostrarMensaje(mensaje, tipo_mensaje){
    if(mensaje) { 
        toastr.options = {
                            "closeButton": true,
                            "positionClass": 'toast-top-full-width',
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
            }
        switch(tipo_mensaje) {
        case 'success':
            toastr.success(mensaje);
            break;
        case 'error':
            toastr.error(mensaje);
            break;
        default:
            toastr.info(mensaje);
        }
    }
}