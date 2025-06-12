<?php if (!is_front_page() && !is_page_template('template-privacy.php') && !is_404()):
    get_template_part('parts/section', 'explore-more');
endif; ?>
</main>
<footer class="footer">
    <p>© 2024 <?= get_bloginfo('name'); ?> - <?= __hepl('Tous droits réservés') ?>.</p>
    <a href="<?= dw_get_permalink('mention-legales') ?>" class="footer__link"><?= __hepl('Mentions légales') ?></a>
</footer>
</body>
</html>