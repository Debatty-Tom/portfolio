<section>
    <?php
    $group = get_field('key_points');

    if ($group && !empty($group)):
        ?>
        <h2><?= esc_html($group['label'] ?? '') ?></h2>

        <?php
        if (is_array($group['key_point']) && !empty($group['key_point'])):
            ?>
            <div>
                <?php
                foreach ($group['key_point'] as $key_point):
                    ?>
                    <?php if (isset($key_point['label']) && $key_point['label']): ?>
                    <p>
                        <?= esc_html($key_point['label']) ?>
                    </p>
                <?php endif; ?>

                    <?php if (isset($key_point['description']) && $key_point['description']): ?>
                    <?= $key_point['description'] ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</section>