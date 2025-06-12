<section class="skills-wall-section">
    <h2 class="section__title"><?= __hepl('Mes compétences') ?></h2>
    <?php if (have_rows('logos_repeater')): ?>
    <?php
        $positions = dwGenerateUniqueGridPositions(count(get_field('logos_repeater')));
        $index = 0;
        ?>
        <ul class="skills-wall">
            <?php while (have_rows('logos_repeater')): the_row();
                $selected_svg = get_sub_field('logo_select');

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
                    <div class="svg-container" title="<?= 'Il s’agit du logo de ' . $svg_label ?>">
                        <desc>
                            <?php get_field('logo_description'); ?>
                        </desc>
                        <figure>
                            <?php echo $svg_content; ?>
                            <figcaption>

                            </figcaption>
                        </figure>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>
