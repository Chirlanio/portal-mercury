<?php
if (!defined('URLADM')) {
    header("Location: /");
    exit();
}
?>
</div>
<footer class="footer mt-auto py-3 bg-dark d-print-none">
    <div class="container text-center navbar-fixed-bottom">
        <span class="text-muted">&copy; Grupo Meia Sola 2020-2021</span>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLADM . 'assets/js/dashboard.js'; ?>"></script>
<script src="<?php echo URLADM . 'assets/js/scrollreveal.min.js'; ?>"></script>
<script src="<?php echo URLADM . 'assets/js/personalizado.js'; ?>"></script>
<script>
    ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
</script>
</body>
</html>