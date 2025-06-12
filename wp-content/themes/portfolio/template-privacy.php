<?php /* Template Name: "Mentions Légales" */ ?>
<?php get_header() ?>
    <main>
        <div class="bg">
            <section class="juridic" data-tag="wysiwyg" data-animation="show-up">
                <h2 class="juridic__title"><?= __hepl('Mentions légales') ?></h2>
                <p class="juridic__date"><?= __hepl('Dernière mise à jour') ?> <?= get_the_modified_date() ?></p>
            </section>
        </div>
        <section class="container__legal wysiwyg" data-tag="wysiwyg" data-animation="show-up">
            <?= get_the_content() ?>
        </section>
    </main>
<?php get_footer() ?>