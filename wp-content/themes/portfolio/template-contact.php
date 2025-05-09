<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>
    <section class="contact">
        <h2 class="sro"><?= __hepl('Formulaire de contact') ?></h2>
        <article class="cordcontact">
            <h2 class="cordcontact__title"><?= __hepl('Mes informations de contact')?></h2>
            <div class="cordcontact__content"><?= get_field('contact_text') ?></div>
            <dl class="cordcontact__container info">
                <dt class="info__title"><?= __hepl('Email')?></dt>
                <?php
                $email = get_option('options_email');
                $phone = get_site_option('options_phone');
                ?>
                <dd class="info__content"><a
                            href="<?= "mailto:" . $email ?>"><?= $email ?></a></dd>
                <dt class="info__title"><?= __hepl('Téléphone') ?></dt>
                <dd class="info__content"><a href="<?= "tel:" . $phone ?>"><?= $phone ?></a>
                </dd>
            </dl>
        </article>
        <div class="contact__right">
            <p class="field__required" data-animation="show-up"><?= strip_tags(get_field('required_field'),
                    ['strong', 'span', 'em']) ?></p>
            <?php
            $errors = $_SESSION['contact_form_errors'] ?? [];
            unset($_SESSION['contact_form_errors']);
            $success = $_SESSION['contact_form_success'] ?? false;
            unset($_SESSION['contact_form_success']);

            if ($success): ?>
                <div class="field__valid">
                    <p><?= $success; ?></p>
                </div>
            <?php else: ?>
                <form action="<?= admin_url('admin-post.php'); ?>" method="POST" class="form">
                    <fieldset class="form__fields">
                        <div class="field__container">
                            <label for="firstname" class="field__label"><?= __hepl('Prénom')?></label>
                            <input type="text" name="firstname" id="firstname" required class="field__input" value="<?= $_SESSION['old']['firstname'] ?? '' ?>" placeholder="Jhon">
                            <?php if (isset($errors['firstname'])): ?>
                                <p class=" field__error"><?= $errors['firstname']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="field__container">
                            <label for="lastname" class="field__label"><?= __hepl('Nom')?></label>
                            <input type="text" name="lastname" id="lastname" required class="field__input" value="<?= $_SESSION['old']['lastname'] ?? '' ?>" placeholder="Doe">
                            <?php if (isset($errors['lastname'])): ?>
                                <p class="field__error"><?= $errors['lastname']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="field__container">
                            <label for="email" class="field__label"><?= __hepl('Adresse mail')?></label>
                            <input type="email" name="email" id="email" required class="field__input" value="<?= $_SESSION['old']['email'] ?? '' ?>" placeholder="john@doe.com">
                            <?php if (isset($errors['email'])): ?>
                                <p class="field__error"><?= $errors['email']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="field__container">
                            <label for="phone" class="field__label"><?= __hepl('Téléphone')?></label>
                            <input type="tel" name="phone" id="phone" class="field__input" value="<?= $_SESSION['old']['phone'] ?? '' ?>" placeholder="+32 471 56 64 98">
                            <?php if (isset($errors['phone'])): ?>
                                <p class="field__error"><?= $errors['phone']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="field__container field__container--full">
                            <label for="message" class="field__label"><?= __hepl('Message')?></label>
                            <textarea name="message" id="message" class="field__textarea" cols="30" rows="10" placeholder="<?= __hepl("J'aurais un projet à vous présenter...") ?>"><?= $_SESSION['old']['message'] ?? '' ?></textarea>
                            <?php if (isset($errors['message'])): ?>
                                <p class="field__error"><?= $errors['message']; ?></p>
                            <?php endif; ?>
                        </div>
                    </fieldset>
                    <div class="form__submit">
                        <?php
                        // ce champ "hidden" permet à WP d'identifier la requête et de la transmettre
                        // à notre fonction définie dans functions.php via "add_action('admin_post_[nom-action]')"
                        ?>
                        <input type="hidden" name="action" value="dw_submit_contact_form">
                        <button type="submit" class="field__submit"><?= __hepl('Envoyer')?></button>
                    </div>
                    <?php
                    $_SESSION['errors'] = [];
                    $_SESSION['old'] = [];
                    ?>
                </form>
            <?php endif; ?>
        </div>
    </section>
<?php get_footer(); ?>