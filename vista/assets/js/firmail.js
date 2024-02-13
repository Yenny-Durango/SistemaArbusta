//función que ejecuta script
function ejecutar() {
    //constructor
    function firma(nombre, mail, puesto, num_cel, loc) {
        this.nombre = nombre;
        this.mail = mail + "@arbusta.net";
        this.puesto = puesto;
        this.num_cel = num_cel;
        this.loc = loc;

        this.ofi = function () {
            //método asignación de oficina
            if (this.loc == "R") {
                this.loc = "Rosario, Argentina";
            } else if (this.loc == "BA") {
                this.loc = "Buenos Aires, Argentina";
            } else if (this.loc == "CM") {
                this.loc = "Medellín, Colombia";
            } else if (this.loc == "MO") {
                this.loc = "Montevideo, Uruguay";
            }
        };

        //método consulta y formato de firma.
        this.generar = function () {
            //consula por campos vacíos
            if ((this.puesto == "") | (this.mail == "@arbusta.net") | (this.nombre == "") | (this.loc == "Seleccionar")) {
                alert("Debe completar todos los campos requeridos.");
            } else {
                //formato de firma
                document.getElementById("firma").innerHTML = " <div class='card card-firma' style='font-size: xx-small; width: 350px; margin: auto; padding: 5px; overflow: auto;'> <div class='imagen-datospersona' style='display: flex; gap: 10px; justify-content: center;display: flex; align-items: center;'><img src='assets/img/arb_firma.gif' alt='' width='60px' height='60px'><div class='items'><div class='item nombre-cargo' style='display: flex; gap: 5px;'><b>" + this.nombre + "</b>/<p>" + this.puesto + "</p></div><div class='item correo-telefono' style='display: flex; gap: 5px;'><p>" + this.mail + "</p>/<p>" + this.num_cel + "</p></div><div class='item sitio-sede' style=' display:flex; gap: 5px;'><a href=''> Arbusta<div class='item sitio-sede'><a href=''><img src='assets/img/facebook.png' alt='facebook' class='icon-firma' width='10px'></a><a href=''><img src='assets/img/signo-de-twitter.png' alt='twitter' class='icon-firma' width='10px'></a><a href=''><img src='assets/img/linkedin.png' alt='linkedin' class='icon-firma' width='10px'></a><a href=''><img src='assets/img/github.png' alt='github' class='icon-firma' width='10px'></a><a href=''><img src='assets/img/instagram.png' alt='instagram' class='icon-firma' width='10px'></a></div></a>/<b>" + this.loc + "</b></div></div></div></div ></div ></div >";
            }
        };
    }

    //creación de objetos tomando datos del formulario.
    var firma = new firma(document.getElementById('nombre').value,
        document.getElementById('mail').value,
        document.getElementById('puesto').value,
        document.getElementById('num_cel').value,
        document.getElementById('loc').value);
    //ejecución de métodos del objeto.
    firma.ofi();
    //firma.carTel();
    firma.generar();
}