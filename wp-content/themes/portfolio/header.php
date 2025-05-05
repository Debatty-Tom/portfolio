<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
    <?php wp_head(); ?>
</head>
<body>
<header class="header">
    <h1 class="header__title"><?= get_bloginfo('name') ?></h1>
    <p class="page__title"><?= get_the_title() ?></p>
    <nav class="header__nav">
        <h2 class="sro"><?= __hepl('Navigation pricinpale') ?></h2>
        <ul class="header__nav__container">
            <li>
                <ul class="header__nav__list header__nav__list--projects">
                    <?php
                    $projectIndex = 0;
                    foreach (dw_get_navigation_links('header') as $link):
                        if (str_contains($link->href, 'projets')):
                            $projectIndex++;
                            ?>
                            <li class="header__nav__item header__nav__item--project header__nav__item--project--<?= $projectIndex ?>">
                                <a href="<?= $link->href; ?>" class="header__nav__link">
                                    <?php
                                    $post_id = url_to_postid($link->href);
                                    if ($post_id && get_post_type($post_id) === 'project'): ?>
                                        <figure class="project__figure">
                                            <?= get_the_post_thumbnail($post_id, 'medium', ['class' => 'project__figure__img']) ?>
                                            <figcaption class="project__label"><?= $link->label; ?></figcaption>
                                        </figure>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endif;
                    endforeach; ?>
                </ul>
            </li>
            <li>
                <ul class="header__nav__list header__nav__list--links">
                    <?php
                    $linkIndex = 0;
                    foreach (dw_get_navigation_links('header') as $link):
                        if (!str_contains($link->href, 'projets')):
                            ?>
                            <li class="header__nav__item header__nav__item--link">
                                <a href="<?= $link->href; ?>" class="header__nav__link"><?= $link->label; ?></a>
                            </li>
                        <?php endif;
                    endforeach; ?>
                    <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                        <li class="languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                            <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                               class="header__nav__link"><?= $lang['locale'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        </ul>

    </nav>
</header>
<main>