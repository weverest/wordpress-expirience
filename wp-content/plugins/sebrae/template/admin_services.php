<?php if(sebrae_active_nav_bar('services', true) || !isset($_GET['tab'])): ?>
    <div class="tabs" id="services">
        <p>Bem vindo ao plugin SEBRAE - Ideias de Negócios!</p>
        <p>
            Este plugin não foi desenvolvido pela própria entidade SEBRAE e sim por uma empresa que desenvolve soluções para o Wordpress.<br/>
            Este plugin realializa uma integração com a API ofical do SEBRAE (<a href="http://www.api.sebrae.com.br/api/" target="_blank">http://www.api.sebrae.com.br/api/</a>
            , esta integração só é possível mediante a cadastro no próprio SEBRAE.
            <br/>
            <b>Para mais informações clique <a href="http://www.api.sebrae.com.br/api/" target="_blank">aqui</a>.</b>
            <br/>
            Este plugin é dependente do webservice do SEBRAE para funcionar corretamente.
            <br/>
            <br/>

            <?php
            /* -- Status dos serviços
            <b>Status</b>
            <br/>
            Configuração <?= sebrae_is_config() ? '<span style="color: #24890d;font-weight: bolder">[OK]</span>' : '<span style="color: #ff0000;font-weight: bolder">[ERRO]</span>'?>
            <br/>
            Credencias <?= sebrae_is_auth() ? '<span style="color: #24890d;font-weight: bolder">[OK]</span>' : '<span style="color: #ff0000;font-weight: bolder">[ERRO]</span>'?>
            <br/>
            <br/>
            */
            ?>

            <b>Shortcodes</b>
            <br/>
            <i>[sebrae-form-setor]</i> - Pesquisa de Ideias por Setor.<br/>
            <i>[sebrae-form-assunto]</i> - Pesquisa de Ideias por assuntos/palavra chave.<br/>
            <i>[sebrae-result]</i> - Resultado da pesquisa.<br/>

            <br/>
            <br/>
            <i>by <b>Grupo DPG</b></i>
        </p>
    </div>
<?php endif ?>