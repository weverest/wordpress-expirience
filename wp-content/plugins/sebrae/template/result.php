<div class="sebrae-result">
    <?php
    if(!isset($_GET['sebrae_identificador'])):
        if(isset($results->ideiaSetores->setor)):
            if(!isset($results->ideiaSetores->setor->identificadorSetor)):
                foreach ($results->ideiaSetores->setor as $r):
                    if ($_GET['sebrae_type'] == 'setor'):
                        echo '<h2 class="sebrae-list-title"><a href="' . $_SERVER['REQUEST_URI'] . '&sebrae_identificador=' . $r->identificadorSetor . '&sebrae_title=' . $r->titulo . '">' . $r->titulo . '</a></h2>';
                    else:
                        echo '<h2 class="sebrae-list-title"><a href="' . $_SERVER['REQUEST_URI'] . '&sebrae_identificador_ideia=' . $r->identificadorIdeia . '&sebrae_title=' . $r->titulo . '">' . $r->titulo . '</a></h2>';
                    endif;
                endforeach;
            else:
                $r = $results->ideiaSetores->setor;
                echo '<h2 class="sebrae-list-title"><a href="' . $_SERVER['REQUEST_URI'] . '&sebrae_identificador=' . $r->identificadorSetor . '&sebrae_title=' . $r->titulo . '">' . $r->titulo . '</a></h2>';
            endif;
        else:
            ?>
            <div class="sebrae-no-result">
                <p>Nenhum resultado encontrado.</p>
            </div>
        <?php endif ?>
    <?php else: ?>
        <?php sebrae_get_content($_GET['sebrae_type'], $_GET['sebrae_identificador']) ?>
    <?php endif ?>
</div>