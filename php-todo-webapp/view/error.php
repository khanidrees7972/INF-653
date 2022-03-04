<div class="row">
    <div class="col col-10">
        <div class="px-5 py-1 toast-denger">
            <h3 class="mb-1">An Error Occured</h3>
            <p><?php echo $error['message']; ?></p>
            <p><?php echo $error['code'] ?></p>
            <?php
            if (array_key_exists('line',$error)) {
                echo "<p>".$error['line']."</p>";
            }
            ?>
        </div>
    </div>
</div>
