<?php
/*
Plugin Name: BR
Description: Soluções em geral para o wordpress do nosso querido Brasil!
Author: Weverest
Author URI: http://weverest.com.br/
Version: 1.0
Text Domain: br
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/
include __DIR__.'/core/functions.php';
include __DIR__.'/core/hooks.php';
register_activation_hook(__FILE__, 'br_install');