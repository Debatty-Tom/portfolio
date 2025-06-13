<section class="explore__container">
    <?php
    if (have_rows('footer_flexible', 'option')) :
        while (have_rows('footer_flexible', 'option')) :
            the_row();

            // Initialisation des variables à chaque itération
            $title = '';
            $content = '';
            $links = [];

            if (is_project_page()) {
                if (get_row_layout() === 'project_footer') {
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                    $links = get_sub_field('page_links') ?? [];
                }
            } else {
                if (get_row_layout() === 'other_footer') {
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                    $links = get_sub_field('page_links') ?? [];
                }
            }
            ?>
            <?php if (isset($title) && $title !== ''): ?>
            <h2 class="explore__title"><?= esc_html($title) ?></h2>
        <?php endif; ?>
            <?php if (isset($content) && $content !== ''): ?>
            <div class="explore__content"><?= $content ?></div>
        <?php endif; ?>
            <?php if (isset($links) && $links !== []): ?>
            <div class="explore__links">
                <?php foreach ($links as $link): ?>
                    <a href="<?= esc_url($link) ?>" class="cta">
                        <?= dw_url_to_page_title($link) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif;
        endwhile;
    endif;
    ?>
</section>

