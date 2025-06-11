$(document).ready(function () {

    var url = window.location.href;
    var url2 = url.split("index.php");


    $("#checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $("#crear-usuario-btn").click(function (event) {
        event.preventDefault();

        let nombre = $("#nombre").val().trim();
        let documento = $("#documento").val().trim();
        let apellido = $("#apellido").val().trim();
        let perfil = parseInt($("#perfil").val().trim());
        let casa = $("#casa").val().trim();
        let password = $("#password").val().trim();
        let conf_password = $("#conf-password").val().trim();
        let usuario = $("#nom_usuario").val().trim();


        if (documento == "") {
            alert("Ingrese el documento.")
            return;
        }
        else if (usuario == "") {
            alert("Ingrese un usuario.");
            return;
        } else if (nombre == "" || apellido == "") {
            alert("Ingrese un nombre y un apellido.");
            return;
        } else if (perfil == "") {
            alert("Seleccione un perfil.");
            return;
        } else if (casa == "") {
            alert("Seleccione una casa.");
            return;
        } else if (password == "") {
            alert("Seleccione una contraseña.");
            return;
        } else if (conf_password == "") {
            alert("Confirme la contraseña.");
            return;
        } else if (password !== conf_password) {
            alert("Las contraseñas no coinciden. Por favor, verifique.");
            return;
        }

        if (password.length < 8) {
            alert("La contraseña debe tener al menos 8 caracteres.");
            return;
        }
        if (!password.match(/[a-z]/)) {
            alert("La contraseña debe contener al menos una letra minúscula.");
            return;
        }
        if (!password.match(/[A-Z]/)) {
            alert("La contraseña debe contener al menos una letra mayúscula.");
            return;
        }
        if (!password.match(/\d/)) {
            alert("La contraseña debe contener al menos un número.");
            return;
        }
        $.post(baseUrl + '/usuarios/public/index.php/insertarUsuario', { nombre: nombre, apellido: apellido, perfil: perfil, casa: casa, password: password, documento: documento, usuario: usuario })
            .done(function (data) {
                if (data == 1) {
                    window.location.href = baseUrl + '/usuarios/public/index.php/listusuarios';
                } else if (data == 2) {
                    alert("El documento ya está registrado.");
                } else if (data == 3) {
                    alert("El usuario ya está registrado.");
                }

            })
            .fail(function () {
                alert("Hubo un error al procesar la solicitud.");
            });

    });

    $("#departamento").change(function (event) {
        
        let depa = $('option:selected', this).attr('dep');

        $.post(url2[0] + 'index.php/getmunicipio',{departamento: depa}, function(data) {
            $("#municipio").html(data);
        }).fail(function() {
            alert("Ocurrió un error al traer los municipios.");
        });
    
    });



    $("#edit-pais").click(function (event) {

        id = $("#idpais").val();
        pais = $("#editDescripcionPais").val();
        const myModal = bootstrap.Modal.getInstance(document.getElementById('modalEditarPais'));
        $.post(url2[0] + 'index.php/editPais',{pais: pais, id:id}, function(data) {
            $("#body-paises").html(data);
            alert("Pais editado correctamente.");

            myModal.hide();

        }).fail(function() {
            myModal.hide();
            alert("Ocurrió un error al Guardar el pais.");
        });
    
    });

    $("#save-pais").click(function (event) {
        
        pais = $("#descripcionPais").val();
        const myModal = bootstrap.Modal.getInstance(document.getElementById('modalAgregarPais'));
        $.post(url2[0] + 'index.php/savePais',{pais: pais}, function(data) {
            $("#body-paises").html(data);
            myModal.hide();

        }).fail(function() {
            myModal.hide();
            alert("Ocurrió un error al Guardar el pais.");
        });
    
    });


    $(document).on('click', '.eliminar-pais', function(){
        id = $(this).attr('flag'); 
        $.post(url2[0]  + "index.php/deletePais", {id:id}, function(data){
            alert("Pais eliminado correctamente.");
             $("#body-paises").html(data);
        }).fail(function() {
            alert("Ocurrió un error al eliminar el pais.");
        });
    });


    
    $(document).on('click', '.editar-pais', function(){
        id = $(this).attr('flag'); 
        const myModal = bootstrap.Modal.getInstance(document.getElementById('modalEditarPais'));

        $.post(url2[0]  + "index.php/getEditPais", {id:id}, function(data){
            myModal.show();
            $('#editDescripcionPais').val(data.pais[0].nombre);  
            $('#idpais').val(data.pais[0].idpais);
        }).fail(function() {
            
            alert("Ocurrió un error al traer los datos del pais.");
        });
    });







    
    $("#edit-proyecto").click(function (event) {

        id = $("#idproyecto").val();
        descripcion = $("#editDescripcionProyecto").val();
        pais = $("#editPais").val();
        ip = $("#editIpProyecto").val();
        espropia = $("#editEsPropia").prop('checked');

        const myModal = bootstrap.Modal.getInstance(document.getElementById('modalEditarProyecto'));
        $.post(url2[0] + 'index.php/editProyecto',{pais: pais, descripcion:descripcion, ip:ip, espropia:espropia, id:id}, function(data) {
            $("#body-proyecto").html(data);
            alert("Proyecto editado correctamente.");

            myModal.hide();

        }).fail(function() {
            myModal.hide();
            alert("Ocurrió un error al editar el proyecto.");
        });
    
    });

    $("#save-proyecto").click(function (event) {
        
        descripcion = $("#descripcionProyecto").val();
        pais = $("#paisProyecto").val();
        ip = $("#ipProyecto").val();
        espropia = $('#esPropia').prop('checked') 

        const myModal = bootstrap.Modal.getInstance(document.getElementById('modaleAgregarProyecto'));
        $.post(url2[0] + 'index.php/saveProyecto',{pais: pais, descripcion:descripcion, ip:ip, espropia:espropia}, function(data) {
            $("#body-proyecto").html(data);
            myModal.hide();

        }).fail(function() {
            myModal.hide();
            alert("Ocurrió un error al Guardar el proyecto.");
        });
    
    });


    $(document).on('click', '.eliminar-proyecto', function(){
        id = $(this).attr('flag'); 
        $.post(url2[0]  + "index.php/deleteProyecto", {id:id}, function(data){
            alert("Proyecto eliminado correctamente.");
             $("#body-proyecto").html(data);
        }).fail(function() {
            alert("Ocurrió un error al eliminar el Proyecto.");
        });
    });


    
    $(document).on('click', '.editar-proyecto', function(){
        id = $(this).attr('flag'); 
        const myModal = bootstrap.Modal.getInstance(document.getElementById('modalEditarProyecto'));

        $.post(url2[0]  + "index.php/getEditProyecto", {id:id}, function(data){
            myModal.show();
            $('#idproyecto').val(data.proyecto[0].idproyecto);  
            $('#editDescripcionProyecto').val(data.proyecto[0].nombre);  
            $('#editPais').val(data.proyecto[0].idpais);  
            $('#editIpProyecto').val(data.proyecto[0].ip);  

            if(data.proyecto[0].espropia == 1){
                $('#editEsPropia').prop('checked', true);

            }else{
                $('#editEsPropia').prop('checked', false);

            }
        }).fail(function() {
            
            alert("Ocurrió un error al traer los datos del proyecto.");
        });
    });








    

    $("#btn-save-visita").click(function(){

        let resultado = $("#resultado-registro").val();
        let flag = 0;

        let archivo1 = $("#archivo1").val();
        let fecharep = $("#registro-reprogramar").val();
        let obs = $("#registro-obs").val();

        $("#archivo1").removeClass('is-invalid');
        $("#registro-reprogramar").removeClass('is-invalid');
        $("#registro-obs").removeClass('is-invalid');

        if(resultado == 1){
            if(archivo1 == ""){
                alert("Debe ingresar por lo menos un archivo.");
                $("#archivo1").addClass('is-invalid');
                flag += 1;
            }
        }else if(resultado == 2){
            if(obs == ""){
                alert("Debe ingresar los motivos.");
                $("#registro-obs").addClass('is-invalid');
                flag += 1;
            }
        }else if(resultado == 3){
            if(fecharep == ""){
                alert("Debe seleccionar la fecha de la nueva visita.");
                $("#registro-reprogramar").addClass('is-invalid');
                flag += 1;
            }
        }


        if(flag == 0){
            alert("Visita Registrada");
           $("#registrar-form").submit();
        }

    });

    $("#btn-exportar").click(function(){
        let flag = 0;
        let ini = $("#fechaIni").val();
        let fin = $("#fechaFin").val();

        if(ini == ""){
            alert("Debe seleccionar la fecha inicial.");
            flag += 1;
        }else if(ini == ""){
            alert("Debe seleccionar la fecha final.");
            flag += 1;
        }

        if(flag == 0){
            $("#exporte-form").submit();
        }

    });


    $("#resultado-registro").change(function (event) {
        
        let resultado = $(this).val();
        $("#fechareprograma").css("display", "none");
        $("#adjuntosregistro").css("display", "none");

       if(resultado == 1){
        $("#adjuntosregistro").css("display", "block");
       }else if(resultado == 3){
        $("#fechareprograma").css("display", "block");
       }
    
    });

    $("#btn-fec-prog").click(function(){
        let fec = $("#fecha-prog").val();
        let flag = 0;
        let count_checked = $("[name='visitasProgramadas[]']:checked").length;

        if(fec == ''){
            alert("Debe seleccionar la fecha para programar la visita.");
            flag += 1;
        }else if(count_checked == 0) {
                alert("Debe seleccionar al menos una visita.");
                flag += 1;
        }

        if(flag == 0){
            $("#fechaprog-from").val(fec);
            $("#prog-form").submit();
        }

    });

    $("#btn-buscar").click(function (event) {
        let cri = $("#criterio").val();
        let val = $("#valor").val();
        let flag = 0;

        if(cri == 0){
            alert('Debe seleccionar un criterio de busqueda.');    
            flag += 1;
        }

        if(flag == 0){
            $.post(url2[0] + 'index.php/realizarbusqueda',{criterio: cri, valor: val}, function(data) {
                $("#resbusqueda").html(data);
            }).fail(function() {
                $("#resbusqueda").html("Ocurrió un error al realizar la busqueda.");
            });
        }
    
    });


    $("#exporte-btn").click(function (event) {
       
       location.href= url2[0] + 'index.php/exportavisitas';
       
       /* $.post(url2[0] + 'index.php/exportavisitas', function(data) {
           
        }).fail(function() {
            $("#resbusqueda").html("Ocurrió un error al realizar la busqueda.");
        });*/
    
    });


    $("#btn-cargar-file").click(function (event) {
        
        let archivo = $("#archivo-file").val();
        let flag = 0;

        if(archivo == ""){
            alert("Debe seleccionar un archivo");
            flag += 1;
        }

        if(flag == 0){
            $("#asignacion-form").submit();
        }
        
     });
    
    


    $("#crearvisita-btn").click(function (event) {
       
        let nombre = $("#nombre").val();
        let dui = $("#dui").val();
        let direccion = $("#direccion").val();
        let telefono = $("#telefono").val();
        let departamento = $("#departamento").val();
        let municipio = $("#municipio").val();
        let cheque = $("#cheque").val();
        let archivo1 = $("#archivo1").val();
        let flag = 0;

        $("#nombre").removeClass('is-invalid');
        $("#dui").removeClass('is-invalid');
        $("#direccion").removeClass('is-invalid');
        $("#telefono").removeClass('is-invalid');
        $("#departamento").removeClass('is-invalid');
        $("#municipio").removeClass('is-invalid');
        $("#cheque").removeClass('is-invalid');
        $("#archivo1").removeClass('is-invalid');

        if(nombre == ""){
            alert("Debe ingresar el nombre del cliente.");
            $("#nombre").addClass('is-invalid');
            flag += 1;
        }else if(dui == ""){
            alert("Debe ingresar el dui del cliente.");
            $("#dui").addClass('is-invalid');
            flag += 1;
        }else if(direccion == ""){
            alert("Debe ingresar la direccion del cliente.");
            $("#direccion").addClass('is-invalid');
            flag += 1;
        }else if(telefono == ""){
            alert("Debe ingresar el telefono del cliente.");
            $("#telefono").addClass('is-invalid');
            flag += 1;
        }else if(departamento == 0){
            alert("Debe seleccionar el departamento.");
            $("#departamento").addClass('is-invalid');
            flag += 1;
        }else if(municipio == 0){
            alert("Debe seleccionar el municipio.");
            $("#municipio").addClass('is-invalid');
            flag += 1;
        }else if(cheque == 0){
            alert("Debe seleccionar si tiene cheque.");
            $("#cheque").addClass('is-invalid');
            flag += 1;
        }else if(archivo1 == ""){
            alert("Debe ingresar por lo menos un archivo.");
            $("#archivo1").addClass('is-invalid');
            flag += 1;
        }


        if(flag == 0){
            alert("Visita Creada");
            $("#crearvisita-form").submit();
        }

    });



});
