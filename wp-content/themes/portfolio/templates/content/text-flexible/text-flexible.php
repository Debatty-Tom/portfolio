<?php $media_position = get_sub_field('flexible_position') ?>

<div class="text-media__position text-media__position--<?= $media_position ?> text-media__flexible">
    <?php if (have_rows('flexible')):
        while (have_rows('flexible')):
            the_row();
            if (get_row_layout() === 'flexible_sub_link'):
                $cta = get_sub_field('sub_link');
                if (!empty($cta)): ?>
                    <a class="text-media__flexible-link button"
                       href="<?= $cta['url'] ?>"
                       target="<?= $cta['target'] ?>"
                       title="<?= $cta['title'] ?>">
                        <?= $cta['title'] ?>
                    </a>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_supline'):
                $supline = get_sub_field('supline');
                if (isset($supline) && $supline !== ''): ?>
                    <p class="text-media__content-supline">
                        <?= $supline ?>
                    </p>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_headline'):
                $headline = get_sub_field('headline');
                if (isset($headline) && $headline !== ''): ?>
                    <p class="text-media__content-headline">
                        <?= $headline ?>
                    </p>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_subline'):
                $subline = get_sub_field('subline');
                if (isset($subline) && $subline !== ''): ?>
                    <p class="text-media__content-subline">
                        <?= $subline ?>
                    </p>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_text'):
                $text = get_sub_field('text');
                if (isset($text) && $text !== ''): ?>
                    <div class="text-media__content-text">
                        <?= $text ?>
                    </div>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_image'):
                $image = get_sub_field('image');
                if (!empty($image)): ?>
                    <?= wp_get_attachment_image($image['ID'], 'text-image', false, array('class' => 'text-media__image')); ?>
                <?php endif; ?>
            <?php elseif (get_row_layout() === 'flexible_file'):
                $file = get_sub_field('file') ?>
            <?php elseif (get_row_layout() === 'flexible_repeater'):
                if (have_rows('repeater')):
                    $index = 0; ?>
                    <ul class="skills__container">
                        <?php while (have_rows('repeater')): the_row();
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
                            <li class="skill_item">
                                <div class="svg-container" title="<?= 'Il s’agit du logo de ' . $svg_label ?>">
                                    <desc class="sro">
                                        <?php the_sub_field('logo_description'); ?>
                                    </desc>
                                    <figure class="logo__figure">
                                        <?php echo $svg_content; ?>
                                        <figcaption class="skills__rating"
                                                    data-score="<?= $rating = get_sub_field('rating'); ?>">
                                            <p class="sro">Cette compétence est maitrisée à <?= $rating; ?> étoiles sur
                                                5</p>
                                        </figcaption>
                                    </figure>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            <?php endif;
        endwhile;
    endif; ?>
</div>
