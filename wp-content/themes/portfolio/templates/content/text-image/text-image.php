<?php $image = get_sub_field('image') ?>
<?php $media_position = get_sub_field('image_position') ?>

<div class="text-media__position text-media__position--<?= $media_position ?>">
    <?php if (!empty($image)): ?>
        <img class="text-media__image"
             src="<?= $image['url'] ?>"
             alt="<?= $image['alt'] ?>"
             width="<?= $image['width'] ?>"
             height="<?= $image['height'] ?>">
    <?php endif; ?>
</div>