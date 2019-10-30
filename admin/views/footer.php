</div>



<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>

<script src="../../assets/js/off-canvas.js"></script>
<script src="../../assets/js/hoverable-collapse.js"></script>
<script src="../../assets/js/misc.js"></script>

<script>
    $(document).on("click", "#confirmacion", function (e) {
        var r = confirm("Esta seguro de eliminar el registro? esta acción no se podra reversar!");
        if (r == true) {
            window.location.href = link;
        } else {
            return false;
        }

    });
</script>

</body>

</html>