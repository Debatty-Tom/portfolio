<section class="key-points">
    <?php
    $group = get_field('key_points');

    if ($group && !empty($group)):
        if (isset($group['label']) && $group['label'] !== ''): ?>
            <h2 class="section__title"><?= esc_html($group['label']) ?></h2>
        <?php
        endif;
        if (is_array($group['key_point']) && !empty($group['key_point'])):
            ?>
            <div class="key-points__container">
                <?php
                foreach ($group['key_point'] as $key_point):
                    ?>
                    <div class="key-point">
                        <?php if (isset($key_point['label']) && $key_point['label']): ?>
                            <p class="key-point__label">
                                <?= esc_html($key_point['label']) ?>
                            </p>
                        <?php endif; ?>
                        <?php if (isset($key_point['description']) && $key_point['description']): ?>
                            <div class="key-point__content">
                                <?= $key_point['description'] ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>