<div class="gallery">
    <div class="gallery__container">
        <?php foreach (get_sub_field('gallery') as $image): ?>
            <a class="gallery__link" href="<?= wp_get_attachment_image_url($image['id'], 'full') ?>"
               data-zoom>
                <?= wp_get_attachment_image($image['id'], 'medium', false, [
                    'class' => 'gallery__img',
                ]) ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>