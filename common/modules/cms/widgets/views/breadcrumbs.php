<ul class="bread_crumbs">
    <li><a href="<?= Yii::getAlias('@web')?>">Home</a></li>
    
    <?php for ($i = 0; $i < sizeof($pagesPath); ++$i)  {
        if( $i != (sizeof($pagesPath)-1)) {?>
            <li><?= $pagesPath[$i]->getLink(); ?></li>
        <?php } else { ?>
            <li><?= $pagesPath[$i]->TITLE; ?></li>
        <?php } ?>
    <?php } ?>
    
</ul>

