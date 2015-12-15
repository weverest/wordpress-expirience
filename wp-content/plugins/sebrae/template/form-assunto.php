<form action="<?=get_site_url()?>/<?=sebrae_get_page_result()?>" class="sebrae_form" method="get">
    <input type="hidden" name="sebrae_type" value="assunto">
    <label for="sebrae-assunto">Busca por Ideia: </label>
    <input name="sebrae_search" class="sebrae-form-assunto" id="sebrae-assunto" value="<?=isset($_GET['sebrae_search']) ? $_GET['sebrae_search'] : ''?>">
    <button class="sebrae-form-btn" type="submit">Pesquisar</button>
</form>