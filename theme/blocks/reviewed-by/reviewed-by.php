<?php
$trusted_content_badge = get_field( 'reviewed_by_trusted_badge', 'option' );
$profile = get_field( 'reviewer_profile_link' );
$thumbnail = get_field( 'reviewer_override_image' );
$tc_badge = get_field( 'reviewed_by_badge', 'option' );
$caption = get_field( 'reviewer_caption' );
$linked_pas = get_field( 'linked_practice_areas' );
$thumbnail = $thumbnail ? $thumbnail['url'] : get_the_post_thumbnail_url( $profile, 'thumbnail' );
?>
<section class="mp-reviewed-by">
    <div class="mp-reviewed-by__thumbnail">
        <img src="<?php echo $thumbnail ?>" alt="<?php echo get_the_title( $profile ) ?> Image" />
    </div>

    <div class="mp-reviewed-by__content">
        <div class="mp-reviewed-by__badge">
            <img src="<?php echo $tc_badge['url'] ?>" alt="<?php echo $tc_badge['alt'] ?>" />
            <strong><?php _e( 'Trusted Content', 'mp' ) ?></strong>
        </div>

        <div class="mp-reviewed-by__meta">
            <p><?php echo esc_html( $caption ) ?></p>

            <div>
                <a href="<?php echo get_permalink( $profile ) ?>" class="mp-reviewed-by__link">
                    <?php echo get_the_title( $profile ) ?>
                </a>
            </div>
        </div>

        <?php if ($linked_pas) : ?>
        <ul class="mp-reviewed-by__pas">
           <?php foreach ( $linked_pas as $pa_id ) : ?>
           <li>
               <a href="<?php echo get_permalink( $pa_id ) ?>">
                   <?php echo get_the_title( $pa_id ) ?> <?php _e( 'Lawyer', 'mp' ) ?>
               </a>
           </li>
            <?php endforeach ?>
        </ul>
        <?php endif ?>
    </div>
</section>
