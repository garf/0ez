<div>
    <div class="list-group">
        <?php foreach($modules as $module) { ?>
            <div class="list-group-item list-group-item-<?= ($module['loaded']) ? 'success' : ($module['required'] ? 'danger' : 'warning') ?>">
                <?php if (isset($module['info'])) { ?>
                    <div class="pull-right">
                        <a href="<?= $module['info'] ?>" title="Information"><i class="glyphicon glyphicon-info-sign"></i></a>
                    </div>
                <?php } ?>
                <h4 class="list-group-item-heading"><?= $module['caption'] ?></h4>
                <p class="list-group-item-text"><?= $module['description'] ?></p>

            </div>
        <?php } ?>
    </div>
    <div class="text-right">
        <a href="/install/index.php?action=step3" class="btn btn-primary">Step 3</a>
    </div>
</div>
