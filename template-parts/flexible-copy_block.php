<?php
    $title = get_sub_field( 'title' );
    $copy = get_sub_field( 'ticopytle' );
    $alignment = get_sub_field( 'alignment' );
?>

<div class="section copy-block">
    <div class="section-content <?php if($alignment == "right"): ?>align-right<?php endif; ?>">
        <h3><?php echo $title; ?></h3>

        <?php echo $copy; ?>
    </div>
</div>