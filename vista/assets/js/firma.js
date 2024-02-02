//función que ejecuta script
function GenerarFirma() {
    //constructor
    function firma(nombre_apellido, sede, telefono, correo, rol_trabajo) {
        this.nombre_apellido = nombre_apellido;
        this.sede = sede;
        this.telefono = telefono;
        this.correo = correo;
        this.rol_trabajo = rol_trabajo;

        this.ofi = function () {
            //método asignación de oficina
            if (this.sede == "ARGENTINA_BUENOS_AIRES") {
                this.sede = "Buenos Aires, Argentina";
            } else if (this.sede == "ARGENTINA_ROSARIO") {
                this.sede = "Rosario, Argentina";
            } else if (this.sede == "URUGUAY_MONTEVIDEO") {
                this.sede = "Montevideo, Uruguay";
            } else if (this.sede == "COLOMBIA_MEDELLIN") {
                this.sede = "Medellín, Colombia";
            }
        };

        //método consulta y formato de firma.
        this.generar = function () {
            //consula por campos vacíos
            if ((this.rol_trabajo == "") | (this.correo == "") | (this.nombre_apellido == "") | (this.sede == "")) {
                alert("Debe completar todos los campos requeridos.");
            } else {
                //formato de firma
                document.getElementById("firma").innerHTML = "<font size='1'><table><tr><img src='./icons/arb_firma.gif' width='81' style='float:left'><tr><td><b>" + this.nombre_apellido + "</b>" + " / " + this.rol_trabajo + "<br>" + "</td></tr><tr><td>" + this.correo + " / " + this.num_cel + "<br>" +
                    "</td></tr><tr><td><a href='https://www.arbusta.net' target='_blank'>Arbusta</a> / <b>" + this.sede + "<br>" + "</b></td></tr>" +
                    "<tr><td><a href='https://es-la.facebook.com/arbustait/' target= '_blank'><img src='./icons/iconmonstr-facebook.png'></a>" +
                    "<a href='https://twitter.com/arbustait' target='_blank'><img src='./icons/iconmonstr-twitter.png'</a>" +
                    "<a href='https://www.linkedin.com/company/arbusta' target='_blank'><img src='./icons/iconmonstr-linkedin.png'></a>" +
                    "<a href='https://github.com/ArbustaIT' target='_blank'><img src='./icons/iconmonstr-github.png'></a>" +
                    "<a href='https://www.instagram.com/arbustait/' target='_blank'><img src='./icons/iconmonstr-instagram.png'></a></td></tr></tr></table></font>";
            }
        };
    }

    //creación de objetos tomando datos del formulario.
    var firma = new firma(document.getElementById('nombre_apellido').value,
        document.getElementById('correo').value,
        document.getElementById('rol_trabajo').value,
        document.getElementById('num_cel').value,
        document.getElementById('sede').value);
    //ejecución de métodos del objeto.
    firma.ofi();
    //firma.carTel();
    firma.generar();
}