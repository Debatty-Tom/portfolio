<?php if (have_rows('content')):
    while (have_rows('content')): the_row();
        if (get_row_layout() === 'text-media'):
            include('text-media/text-media.php');
        elseif (get_row_layout() === 'text-gallery'):
            include('text-gallery/text-gallery.php');
        elseif (get_row_layout() === 'slider'):
            include('slider/slider.php');
        elseif (get_row_layout() === 'text-image'):
            include('text-image/text-image.php');
        endif;
    endwhile;
endif;