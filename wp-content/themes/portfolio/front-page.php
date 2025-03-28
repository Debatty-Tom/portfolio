<?php get_header(); ?>
<aside>
    <h2><?= __hepl('Bienvenue sur mon site')?>&nbsp;!</h2>
</aside>
<?php
// On ouvre "la boucle" (The Loop), la structure de contrôle
// de contenu propre à Wordpress:
if(have_posts()): while(have_posts()): the_post(); ?>

    <div><?= get_the_content(); ?></div>

<?php
    // On ferme "la boucle" (The Loop):
endwhile; else: ?>
    <p><?= __hepl('La page est vide.')?></p>
<?php endif; ?>
<section>
    <h2><?= __hepl('Mes derniers projets')?></h2>
    <div class="projects">
        <?php
        $projects = new WP_Query([
            'post_type' => 'project',
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => 6,
        ]);

        if($projects->have_posts()): while($projects->have_posts()): $projects->the_post(); ?>
            <article class="project">
                <a href="<?= get_the_permalink(); ?>" class="project__link">
                    <span class="sro"><?= __hepl('Découvrir le le projet')?><?= get_the_title(); ?></span>
                </a>
                <div class="project__card">
                    <header class="project__head">
                        <h3 class="project__title"><?= get_the_title(); ?></h3>
                    </header>
                    <figure class="project__fig">
                        <?= get_the_post_thumbnail(size: 'medium', attr: ['class' => 'project__img']); ?>
                    </figure>
                </div>
            </article>
        <?php endwhile; else: ?>
            <p><?= __hepl('Je n’ai pas de projets récents à montrer pour le moment...')?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>







