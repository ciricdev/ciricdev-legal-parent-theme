<?php
?>
<section class="mp-key-takeaways">
    <div class="mp-key-takeaways__header">
        <?php if ($icon = get_field('key_takeaways_icon', 'options')) : ?>
        <img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" class="mp-key-takeaways__icon" />
        <?php endif ?>

        <?php the_field('key_takeaways_header', 'options') ?>
    </div>

    <div class="mp-key-takeaways__content">
        <?php the_field('content') ?>
    </div>
</section>
