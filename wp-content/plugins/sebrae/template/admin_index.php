<div class="wrap">
    <section class="text-center">
        <img src="<?= plugins_url('sebrae/template/assets/img/sebrae_logo.png')?>">
    </section>
    <h2 class="nav-tab-wrapper">
        <a href="?page=sebrae&tab=services" class="nav-tab <?php sebrae_active_nav_bar('services'); echo !isset($_GET['tab']) ? 'nav-tab-active' : '' ?>">Shortcodes</a>
        <a href="?page=sebrae&tab=config" class="nav-tab <?php sebrae_active_nav_bar('config') ?>">Configurações</a>
    </h2>
    <?php sebrae_load_page() ?>
</div>
