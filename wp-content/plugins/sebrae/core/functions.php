<?php

/**
 * Functions to hook
 */

/**
 * When plugin is active
 */
function sebrae_install(){
    global $wpdb;

    $option = get_option('sebrae_page');
    if($option){
        $page_title = get_the_title($option);
        if(empty($page_title))
            $page_title = "Resultado de pesquisa SEBRAE";
    } else {
        $page_title = "Resultado de pesquisa SEBRAE";
    }

    $page = get_page_by_title($page_title);
    if(!$page) {
        // Create post object
        $_p = array();
        $_p['post_title'] = $page_title;
        $_p['post_content'] = "[sebrae-form-setor] [sebrae-result]";
        $_p['post_status'] = 'publish';
        $_p['post_type'] = 'page';
        $_p['comment_status'] = 'closed';
        $_p['ping_status'] = 'closed';
        $_p['post_category'] = array(1); // the default 'Uncatrgorised'

        // Insert the post into the database
        $page_id = wp_insert_post($_p);
        if($option)
            update_option('sebrae_page', $page_id);
        else
            add_option('sebrae_page', $page_id);
    } else {
        //make sure the page is not trashed...
        $page->post_status = 'publish';
        wp_update_post( $page );
    }
}

function sebrae_deactivation(){
    global $wpdb;

    $option = get_option('sebrae_page');
    if($option){
        $page_title = get_the_title($option);
        if(empty($page_title))
            $page_title = "Resultado de pesquisa SEBRAE";
    } else {
        $page_title = "Resultado de pesquisa SEBRAE";
    }
    $page = get_page_by_title($page_title);

    if($page) {
        $page->post_status = 'private';
        wp_update_post($page);
    }
}

function sebrae_get_page_result(){
    global $post;
    $page_id = get_option('sebrae_page');
    $page = get_post($page_id);
    return $page->post_name;
}


/**
 * Save config
 */
function sebrae_admin_save_config_form(){
    if($_POST){
        $required = array('sebrae_hash', 'sebrae_user', 'sebrae_password');
        $flag = true;
        foreach($required as $v){
            if(!isset($_POST[$v])){
                $flag = false;
                break;
            }
        }

        if($flag){
            $options = array(
                'hash' => $_POST['sebrae_hash'],
                'user' => $_POST['sebrae_user'],
                'password' => $_POST['sebrae_password']
            );

            if(!get_option('sebrae'))
                add_option('sebrae', $options);
            else
                update_option('sebrae', $options);

            wp_redirect(get_admin_url().'admin.php?page=sebrae&tab=config&save=true');
            exit;
        } else {
            wp_redirect(get_admin_url().'admin.php?page=sebrae&tab=config&save=false');
            exit;
        }
    }
}

function sebrae_shortcode_result(){
    if(isset($_GET['sebrae_search']) && isset($_GET['sebrae_type'])){
        $type = $_GET['sebrae_type'];
        $search = $_GET['sebrae_search'];
        $results = null;
        switch($type){
            case 'setor' :
                $options = sebrae_get_credentials();
                $api = new SebraeAPI($options['hash'], $options['user'], $options['password']);
                $results = $api->getIdeiasPorSetor($search);
                break;
            case 'assunto':
                $options = sebrae_get_credentials();
                $api = new SebraeAPI($options['hash'], $options['user'], $options['password']);
                $results = $api->getIdeiasPorAssunto($search);
                break;
        }

        include SEBRAE_DIR . 'template/result.php';
    }
}

function sebrae_get_content($type, $id){
    $results = null;
    if(!isset($_GET['sebrae_identificador_ideia'])) {
        switch ($type) {
            case 'setor':
                $options = sebrae_get_credentials();
                $api = new SebraeAPI($options['hash'], $options['user'], $options['password']);
                $results = $api->getIdeiasPorSetorID($id);

                if ($results != null) {
                    if (count($results->ideiasIdentificadores->ideiaidentificador) > 0) {
                        foreach ($results->ideiasIdentificadores->ideiaidentificador as $r) {
                            echo '<h2 class="sebrae-list-title"><a href="' . $_SERVER['REQUEST_URI'] . '&sebrae_identificador_ideia=' . $r->identificadorIdeia . '&sebrae_title=' . $r->titulo . '">' . $r->titulo . '</a></h2>';
                        }
                    } else {
                        sebrae_not_found_message();
                    }
                } else {
                    sebrae_not_found_message();
                }
                break;
        }
    } else {
        $id = $_GET['sebrae_identificador_ideia'];
        $options = sebrae_get_credentials();
        $api = new SebraeAPI($options['hash'], $options['user'], $options['password']);
        $result = $api->getIdeia($id);

        if($result != null){
            $result = $result->ideiaDeNegocio;
            include SEBRAE_DIR . 'template/ideia.php';
        } else {
            sebrae_not_found_message();
        }
    }
}

function sebrae_is_config(){
    $options = get_option('sebrae');
    if($options && count($options) > 0)
        return true;
    return false;
}

function sebrae_is_auth(){
    if(sebrae_is_config()){
        $options = sebrae_get_credentials();
        $api = new SebraeAPI($options['hash'], $options['user'], $options['password']);
        return $api->isAuthorized();
    }
    return false;
}

function sebrae_not_found_message(){
    ?>
    <div class="sebrae-no-result">
        <p>Nenhum resultado encontrado.</p>
    </div>
    <?php
}

/**
 * @param $class_name
 */
function __autoload($class_name){
    $path = SEBRAE_DIR . 'core/'.$class_name.'.php';
    if(file_exists($path))
        include $path;
}

/**
 * sebrae_menu
 * Add munu sidebar
 */
function sebrae_menu(){
    add_menu_page('SEBRAE', 'SEBRAE', 'manage_options', 'sebrae', 'sebrae_template_admin_index', plugins_url('sebrae/template/assets/img/menu_icon.png'));
}

function sebrae_template_admin_index(){
    include SEBRAE_DIR.'template/admin_index.php';
}

/**
 * sebrae_admin_style
 * Custom css
 */
function sebrae_admin_style() {
    wp_enqueue_style('my-admin-theme', plugins_url('sebrae/template/assets/css/admin.css'));
}

/**
 * sebrae_active_nav_bar
 * Check if tab is active
 * @param $tab
 * @param bool|false $return_bool
 * @return bool
 */
function sebrae_active_nav_bar($tab, $return_bool = false){
    if(isset($_GET['tab']) && $tab == $_GET['tab']){
        if(!$return_bool)
            echo 'nav-tab-active';
        else
            return true;
    }
    if($return_bool)
        return false;
}

/**
 * sebrae_load_page
 * Load page layout by tab
 */
function sebrae_load_page(){
    if(isset($_GET['tab'])){
        $tab = $_GET['tab'];
        switch($tab){
            case 'services':
                include SEBRAE_DIR . 'template/admin_services.php';
                break;
            case 'config':
                include SEBRAE_DIR . 'template/admin_config.php';
                break;
            default:
                include SEBRAE_DIR . 'template/admin_config.php';
        }
    } else {
        include SEBRAE_DIR . 'template/admin_services.php';
    }
}

/**
 * @param $option
 * @return null
 */
function sebrae_get_option($option){
    $options = get_option('sebrae');
    if($options && isset($options[$option])){
        return $options[$option];
    }
    return null;
}

/**
 * @return array|void|bool
 */
function sebrae_get_credentials(){
   return get_option('sebrae');
}

function sebrae_shortcode_form_setor(){
    include SEBRAE_DIR . 'template/form-setor.php';
}

function sebrae_shortcode_form_assunto(){
    include SEBRAE_DIR . 'template/form-assunto.php';
}