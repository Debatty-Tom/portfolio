<?php $supline = get_sub_field('supline') ?>
<?php $headline = get_sub_field('headline') ?>
<?php $subline = get_sub_field('subline') ?>
<?php $text = get_sub_field('text') ?>
<?php $section_id = dw_get_section_id($headline) ?>

<?php if (!empty($media_type) && $media_type === 'text-gallery'){
    $media_position = get_sub_field('gallery_position');
} elseif (!empty($media_type) && $media_type === 'text-image'){
    $media_position = get_sub_field('image_position');
} elseif (!empty($media_type) && $media_type === 'text-flexible'){
    $media_position = get_sub_field('flexible_position');
} else{
    $media_position = "";
}
?>

<section class="text-media <?php if ($media_position === 'center'): echo 'text-media__center'; endif; ?>"
    <?php if (!empty($section_id)): ?>
        id="<?= esc_attr($section_id) ?>"
    <?php endif; ?>>
    <?php if (!isset($headline) || $headline === ''): ?>
        <h2 class="sro"><?= get_the_title() ?></h2>
    <?php endif; ?>
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
            <div class="text-media__content-text wysiwyg">
                <?= $text ?>
            </div>
        <?php endif; ?>
        <?php if (have_rows('flexible_link')): ?>
            <div class="text-media__links__container">
                <?php while (have_rows('flexible_link')): the_row();
                    if (get_row_layout() === 'flexible_cta'):
                        $cta = get_sub_field('link');
                        if (!empty($cta)): ?>
                            <a class="cta"
                               href="<?= $cta['url'] ?>"
                               target="<?= $cta['target'] ?>"
                               title="<?= $cta['title'] ?>">
                                <?= $cta['title'] ?>
                            </a>
                        <?php endif;
                    endif;
                endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    <?php
    if (!empty($media_type)) {
        $partial_path = $media_type . '/' . $media_type . '.php';
        if ($partial_path) {
            include($partial_path);
        } else {
            echo 'Type de média non pris en charge.';
        }
    } ?>
</section>