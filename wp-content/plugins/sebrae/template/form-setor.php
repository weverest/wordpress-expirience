<form action="<?=get_site_url()?>/<?=sebrae_get_page_result()?>" class="sebrae_form" method="get">
    <input type="hidden" name="sebrae_type" value="setor">
    <label for="setor">Consultar Ideias por Setor: </label>
    <input name="sebrae_search" class="sebrae-form-setor" id="sebrae-setor" value="<?=isset($_GET['sebrae_search']) ? $_GET['sebrae_search'] : ''?>">
    <button class="sebrae-form-btn" type="submit">Pesquisar</button>
</form>