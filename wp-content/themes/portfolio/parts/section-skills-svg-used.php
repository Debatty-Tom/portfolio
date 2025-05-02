<section>
    <h2><?= esc_html__('Mes compétences', 'text-domain') ?></h2>
    <?php if (have_rows('logos_repeater')): ?>
        <ul>
            <?php while (have_rows('logos_repeater')): the_row();
                $selected_svg = get_sub_field('logo_select'); // Récupère le champ Select

                // Vérifie que c'est bien un tableau et qu'il contient une valeur
                if (is_array($selected_svg) && isset($selected_svg['value'])) {
                    $svg_value = $selected_svg['value']; // Valeur du select (ex: "php")
                    $svg_label = $selected_svg['label']; // Label du select (ex: "php")

                    // Chemin vers le fichier SVG (ajuste selon ton setup)
                    $svg_path = get_template_directory() . '/resources/img/skills/' . $svg_value . '.svg';

                    // Vérifier si le fichier existe
                    if (file_exists($svg_path)) {
                        $svg_content = file_get_contents($svg_path);
                    } else {
                        $svg_content = '<p>SVG introuvable</p>';
                    }
                } else {
                    $svg_content = '<p>Aucune sélection</p>';
                    $svg_label = 'Inconnu';
                }
                ?>
                <li>
                    <div class="svg-container">
                        <title>
                            <?= 'Il s’agit du logo de '.$svg_label ?>
                        </title>
                        <desc>
                            <?php get_field('logo_description'); ?>
                        </desc>
                        <?php echo $svg_content; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</section>
