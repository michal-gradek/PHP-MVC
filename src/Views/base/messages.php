<?php if(!empty($_SESSION['message']) && !empty($_SESSION['message_type'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['message_type']?>" id="alertMess" style="margin: 0; padding: 0;"><?php echo $_SESSION['message']?></div>
    <?php
        echo '
            <script type="text/javascript">
                setTimeout(function() {
                    document.getElementById("alertMess").style.display = "none";
                }, 5000); 
            </script>
        ';
        unset($_SESSION['message'], $_SESSION['message_type']);
    ?>
<?php endif; ?>