<?php
/* Runs when plugin is activated */
add_action('admin_enqueue_scripts', 'sebrae_admin_style');
add_action('wp_enqueue_scripts', 'sebrae_admin_style');
add_action('admin_menu', 'sebrae_menu');
add_action('admin_post_submit-form', 'sebrae_admin_save_config_form');

/*Short Codes */
add_shortcode('sebrae-form-setor', 'sebrae_shortcode_form_setor');
add_shortcode('sebrae-form-assunto', 'sebrae_shortcode_form_assunto');
add_shortcode('sebrae-result', 'sebrae_shortcode_result');
