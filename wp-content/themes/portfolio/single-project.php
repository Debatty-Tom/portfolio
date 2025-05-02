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
<?php get_footer(); ?>