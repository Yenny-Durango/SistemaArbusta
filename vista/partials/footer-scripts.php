</div>
</div>
</main>
</div>
</div>

<!-- LISTAR CON DATATABLES -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<!-- Inicializamos DataTables con configuraciones de desplazamiento -->
<script>
   new DataTable('#example', {
      scrollX: true,
      scrollY: 250,
      autoWidth: true
   });
</script>

<!-- Only load necessary scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="assets/js/jquery-3.7.1.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/equipo.js"></script>
<script src="assets/js/ticket.js"></script>
<script src="assets/js/usuario.js"></script>
<script src="assets/js/firmail.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/84339ecbcb.js" crossorigin="anonymous"></script>

<script>
   function Metodo(pagina) {
      $.ajax({
         type: "POST",
         url: pagina,
         data: {},
         success: function(data) {
            $("#qCarga").html(data);
         }
      });
   };
</script>
</body>

</html>