<?php $supline = get_sub_field('supline') ?>
<?php $headline = get_sub_field('headline') ?>
<?php $subline = get_sub_field('subline') ?>
<?php $text = get_sub_field('text') ?>
<?php $image = get_sub_field('image') ?>
<?php $media_position = get_sub_field('media_position') ?>
<?php $media_type = get_sub_field('media_type') ?>

<section class="text-media">

    <div class="text-media__content-container">
        <?php if (isset($supline) && $supline !== ''): ?>
            <p class="text-media__content-supline">
                <?= $supline ?>
            </p>
        <?php endif; ?>
        <?php if (isset($headline) && $headline !== ''): ?>
            <h2 class="text-media__content-headline">
                <?= $headline ?>
            </h2>
        <?php endif; ?>
        <?php if (isset($subline) && $subline !== ''): ?>
            <p class="text-media__content-subline">
                <?= $subline ?>
            </p>
        <?php endif; ?>
        <?php if (isset($text) && $text !== ''): ?>
            <div class="text-media__content-text">
                <?= $text ?>
            </div>
        <?php endif; ?>
        <?php if (have_rows('flexible_content')):
            while (have_rows('flexible_content')): the_row();
                if (get_row_layout() === 'flexible_cta'):
                    $cta = get_sub_field('link');
                    if (!empty($cta)): ?>
                        <a class="text-media__content-link"
                           href="<?= $cta['url'] ?>"
                           target="<?= $cta['target'] ?>"
                           title="<?= $cta['title'] ?>">
                            <?= $cta['title'] ?>
                        </a>
                    <?php endif;
                endif;
            endwhile;
        endif; ?>
    </div>
    <div class="text-media__position text-media__position--<?= $media_position ?>">
        <?php if (!empty($image)): ?>
            <img class="text-media__image"
                 src="<?= $image['url'] ?>"
                 alt="<?= $image['alt'] ?>"
                 width="<?= $image['width'] ?>"
                 height="<?= $image['height'] ?>">
        <?php endif; ?>
    </div>
</section>