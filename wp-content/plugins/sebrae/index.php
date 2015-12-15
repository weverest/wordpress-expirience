<?php
/*
Plugin Name: SEBRAE
Description: Plugin para integração de serviços do SEBRAE via API.
Author: Grupo DPG
Author URI: http://grupodpg.com.br/
Version: 1.0
Text Domain: sebrae
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
include 'bootstrap.php';
register_activation_hook(__FILE__, 'sebrae_install');
register_deactivation_hook(__FILE__, 'sebrae_uninstall');