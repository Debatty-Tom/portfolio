<?php get_header(); ?>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if (have_posts()): while (have_posts()): the_post(); ?>
    <?php include('templates/content/flexible.php') ?>
<?php
    // On ferme "la boucle" (The Loop):
endwhile;
else: ?>
    <p><?= __hepl('Ce projet n’existe pas') ?>.</p>
<?php endif; ?>
    <section class="related">
        <h2 class="section__title"><?= __hepl('Autres projets qui pourraient vous intéresser...') ?></h2>
        <div class="related__container">
            <?php
            $project = new WP_Query([
                'post_type' => 'project',
                'orderby' => 'rand',
                'posts_per_page' => 2,
                'post__not_in' => [get_the_ID()],
            ]);

            if ($project->have_posts()): while ($project->have_posts()): $project->the_post(); ?>
                <article class="project">
                    <a href="<?= get_the_permalink(); ?>" class="project__link"><span
                                class="sro"><?php __hepl('Voir le projet') ?> "<?= get_the_title(); ?>"</span></a>
                    <div class="project__card">
                        <h3 class="project__title"><?= get_the_title(); ?></h3>
                        <figure class="project__related__figure">
                            <?= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'recipe__img']); ?>
                        </figure>
                    </div>
                </article>
            <?php endwhile; endif; ?>
        </div>
    </section>
<?php get_footer(); ?>