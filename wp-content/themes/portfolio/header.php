<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<header class="header" role="banner">
    <h1 class="sro"><?= dw_get_page_title() ?></h1>
    <div class="header__container">
        <nav class="nav">
            <h2 class="sro"><?= __hepl('Navigation principale') ?></h2>
            <a class="header__title" href="<?= home_url() ?>"
               title="Vers la page d'accueil"><?= get_bloginfo('name') ?></a>
            <label class="sro" for="burger">Burger menu</label>
            <input type="checkbox" name="burger" id="burger">
            <div class="burger__wrapper">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav__container">
                <?php foreach (dw_get_navigation_links('header') as $link):
                    if (!str_contains($link->href, 'projets')): ?>
                        <li class="nav__item">
                            <a href="<?= $link->href; ?>" class="nav__link underline"><?= $link->label; ?></a>
                        </li>
                    <?php endif;
                endforeach; ?>
                <?php foreach (pll_the_languages(['raw' => true, 'hide_if_no_translation' => false, 'hide_if_empty' => false]) as $lang): ?>
                    <li class="<?= $lang['current_lang'] ? ' languages__item--current' : 'nav__item' ?>">
                        <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>"
                           hreflang="<?= $lang['locale'] ?>"
                           class="nav__link underline"
                           title="<?= __hepl('Changer la langue en ') . $lang['name'] ?>"><?= $lang['slug'] ?></a>
                    </li>
                <?php endforeach; ?>
                <li class="nav__item nav__sublist__container">
                    <p class="nav__link">
                        <?= __hepl('Mes projets') ?>
                    </p>
                    <ul class="nav__sublist">
                        <?php
                        foreach (dw_get_navigation_links('header') as $link):
                            if (str_contains($link->href, 'projets')):
                                ?>
                                <li class="nav__item underline">
                                    <a href="<?= $link->href; ?>" class="nav__sublist__link"
                                       title="<?= __('lien vers le projet nommé ' . $link->label) ?>">
                                        <?= $link->label; ?>
                                    </a>
                                </li>
                            <?php endif;
                        endforeach; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <section class="project__container">
        <?php if (is_404()) : ?>
            <h2 class="notfound__title page__title">404</h2>
            <p class="notfound__text"><?= __hepl('La page que vous avez recherché n’existe pas, a été déplacée ou n’existe plus.') ?></p>
        <?php else : ?>
            <h2 class="page__title"><?= dw_get_page_title() ?></h2>
        <?php endif; ?>
        <ul class="project__list">
            <?php
            $projects = new WP_Query([
                'post_type' => 'project',
                'posts_per_page' => -1,
            ]);

            $projectIndex = 0;

            if ($projects->have_posts()):
                while ($projects->have_posts()): $projects->the_post();
                    $projectIndex++;
                    $title = get_the_title();
                    $permalink = get_permalink();
                    ?>
                    <li class="project__item project__item--<?= $projectIndex ?>">
                        <a href="<?= esc_url($permalink) ?>" class="project__link"
                           title="<?= esc_attr(__('Lien vers le projet nommé ' . $title)) ?>">
                            <figure class="project__figure">
                                <?= get_the_post_thumbnail(get_the_ID(), 'naviguation', ['class' => 'project__figure__img']) ?>
                                <figcaption class="project__label"><?= esc_html($title) ?></figcaption>
                            </figure>
                        </a>
                    </li>
                <?php endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
    </section>
</header>