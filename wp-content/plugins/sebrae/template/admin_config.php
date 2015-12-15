<?php if(sebrae_active_nav_bar('config', true)): ?>
    <div class="tabs" id="config">
        <?php
        if(isset($_GET['save'])){
            $save = $_GET['save'];
            if($save == 'true')
                echo '<div class="updated fade" style="padding: 10px">Configurações salvas com sucesso.</div>';
            else
                echo '<div class="error" style="padding: 10px">Falha ao salvar as configurações. Tente novamente.</div>';
        }
        ?>
        <form method="post" action="<?=get_admin_url()?>admin-post.php">
            <input type='hidden' name='action' value='submit-form' />
            <table class="form-table">
                <tbody>
                <tr>
                    <th scope="row"><label for="sebrae_hash">Hash de Identificação</label></th>
                    <td><input name="sebrae_hash" type="text" id="sebrae_hash" class="regular-text" value="<?=sebrae_get_option('hash')?>" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="sebrae_user">Usuário</label></th>
                    <td><input name="sebrae_user" type="text" id="sebrae_user" class="regular-text" value="<?=sebrae_get_option('user')?>" required></td>
                </tr>
                <tr>
                    <th scope="row"><label for="sebrae_password">Senha</label></th>
                    <td><input name="sebrae_password" type="text" id="sebrae_password" class="regular-text" value="<?=sebrae_get_option('password')?>" required></td>
                </tr>
                <tr>
                    <td><?php echo get_submit_button("Salvar"); ?></td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
<?php endif ?>