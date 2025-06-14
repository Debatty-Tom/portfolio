<section class="skills-wall-section">
    <h2 class="section__title"><?= __hepl('Mes compétences') ?></h2>
    <?php if (have_rows('logos_repeater')): ?>
        <?php
        $rows = get_field('logos_repeater');
        $total = count($rows);
        $midpoint = ceil($total / 2);

        $first_half = array_slice($rows, 0, $midpoint);
        $second_half = array_slice($rows, $midpoint);
        ?>
        <div class="skills-wall-wrapper">
            <?php foreach ([$first_half, $second_half] as $half): ?>
                <?php $positions = dwGenerateUniqueGridPositions(count($half)); ?>
                <?php $index = 0; ?>
                <ul class="skills-wall">
                    <?php foreach ($half as $row): ?>
                        <?php
                        $selected_svg = $row['logo_select'];
                        $rating = $row['rating'];
                        $description = $row['logo_description'];

                        if (is_array($selected_svg) && isset($selected_svg['value'])) {
                            $svg_value = $selected_svg['value'];
                            $svg_label = $selected_svg['label'];
                            $svg_path = get_template_directory() . '/resources/img/skills/' . $svg_value . '.svg';

                            if (file_exists($svg_path)) {
                                $svg_content = file_get_contents($svg_path);
                            } else {
                                continue;
                            }
                        } else {
                            $svg_content = '<p>Aucune sélection</p>';
                            $svg_label = 'Inconnu';
                        }
                        ?>
                        <li class="skills-wall__item <?= $positions[$index++] ?>">
                            <div class="svg-container" title="<?= __hepl('Il s’agit du logo de ') . esc_attr($svg_label) ?>">
                                <desc class="sro"><?= esc_html($description); ?></desc>
                                <figure class="logo__figure">
                                    <?= $svg_content; ?>
                                    <figcaption class="skills__rating" data-score="<?= esc_attr($rating); ?>">
                                        <p class="sro"><?= __hepl('Cette compétence est maitrisée à') ?> <?= esc_html($rating); ?> <?= __hepl('étoiles sur 5') ?></p>
                                    </figcaption>
                                </figure>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
