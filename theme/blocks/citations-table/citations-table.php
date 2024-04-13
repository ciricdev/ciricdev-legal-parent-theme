<?php
$title = get_field('title');
$citations = get_field('citations');
?>
<section class="mp-citations-table">
    <h2 class="mp-citations-table__header"><?php echo esc_html($title) ?></h2>
    <ol class="mp-citations-table__citations">
        <?php foreach($citations as $citation) : ?>
        <li class="mp-citations-table__citations__citation">
            <p class="mp-citations-table__content"><?php echo esc_html($citation['content']) ?></p>
            <a class="mp-citations-table__link" href="<?php echo $citation['external_link'] ?>" target="_blank">
                <?php echo $citation['external_link'] ?>
            </a>
        </li>
        <?php endforeach ?>
    </ol>
</section>
