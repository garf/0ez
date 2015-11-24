<div class="list-group">
    <?php $items = include(base_path('config/routes.php')); $current_was = false; ?>
    <?php foreach($items as $index=>$item) { ?>
        <?php if($index == 'default') continue; ?>
        <?php if (!$current_was) { ?>
        <a href="/install/index.php?action=<?= $index ?>"
           class="list-group-item <?= (isset($current_action) && $current_action == $index) ? 'active' : '' ?>">
            <?= (isset($current_action) && $current_action == $index) ? '<i class="glyphicon glyphicon-play"></i> ' : '' ?>
            <?= (isset($item[1])) ? $item[1] : $item[0] ?>
        </a>
        <?php } else { ?>
            <div class="list-group-item disabled"><?= (isset($item[1])) ? $item[1] : $item[0] ?></div>
        <?php } ?>
        <?php $current_was = $current_was ? true : (isset($current_action) && $current_action == $index) ? true : false ?>
    <?php } ?>
</div>