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
            if (this.loc == "Rosario, Argentina") {
                this.loc = "Rosario, Argentina";
            } else if (this.loc == "Buenos Aires, Argentina") {
                this.loc = "Buenos Aires, Argentina";
            } else if (this.loc == "Medellin, Colombia") {
                this.loc = "Medellín, Colombia";
            } else if (this.loc == "Montevideo, Uruguay") {
                this.loc = "Montevideo, Uruguay";
            }
        };

        //método consulta y formato de firma.
        this.generar = function () {
            //consula por campos vacíos
            if ((this.puesto == "") | (this.mail == "") | (this.nombre == "") | (this.loc == "Seleccionar")) {
                alert("Debe completar todos los campos requeridos.");
            } else {
                //formato de firma
                document.getElementById("firma").innerHTML = `
                    <div class='contenedor-firma'>
                    <div class='card-firma'>
                    <img src="assets/img/arb_firma.gif" alt="LOGO ARBUSTA" class="logo">
                    <div class="contenido">
                        <div class="item">
                            <p>${nombre}</p><b>/</b>
                            <p>${puesto}</p>
                        </div>
                        <div class="item">
                            <p>${mail}</p><b>/</b>
                            <p>${num_cel}</p>
                        </div>
                        <div class="item">
                            <a href="https://www.arbusta.net/">
                                <p>Arbusta</p>
                            </a>
                            <b>/</b>
                            <p>${loc}</p>
                        </div>
                        <div class="redes_sociales">
                            <a href="https://es-la.facebook.com/arbustait/"><img src="assets/img/facebook.png" alt="" width="10px"></a>
                            <a href="https://twitter.com/arbustait"><img src="assets/img/signo-de-twitter.png" alt="" width="10px"></a>
                            <a href="https://ar.linkedin.com/company/arbustait"><img src="assets/img/linkedin.png" alt="" width="10px"></a>
                            <a href="https://github.com/ArbustaIT"><img src="assets/img/github.png" alt="" width="10px"></a>
                            <a href="https://www.instagram.com/arbustait/"><img src="assets/img/instagram.png" alt="" width="10px"></a>
                        </div>
                    </div>
                </div>
            </div> `;
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