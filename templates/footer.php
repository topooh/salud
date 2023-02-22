</main>
  <footer>
<br>
  <center>
    Sistema de pedidos de permisos Version 0.0.1B Funcionando el ingreso de personal distuinguido. 

    
  </center>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
<script>
 $(document).ready(function () {
    $('#tabla_id').DataTable({
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, 'All'],
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json" // no me esta llamando el idioma
        } 
    });
});
</script>
<script>
//llevar a lfooter
function borrar(id){
Swal.fire({
title: '¿Deseas Borrar los registros ?',
showCancelButton: true,
confirmButtonText: 'Si, Borrar',
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.isConfirmed) {
Swal.fire('Eliminado!', '', 'success')
window.location="index.php?txtID="+id;
} else if (result.isDenied) {
Swal.fire('Los Cambios No se Guardaron', '', 'info')
}
})

//index.php?txtID=
}
</script>
</body>



</html>