<?php

# Open a session

use core\classes\Database;

session_start();

# Automatically loads all project classes - through composer.
require_once ('../vendor/autoload.php');

# Loading routes
require_once ('../core/routes.php');






/* Not remove
$db = new Database();
create / delete
$clientes = $db->update("UPDATE clientes SET nome = 'Cris2' WHERE id = 1");
$clientes = $db->select("SELECT * FROM clientes c where c.id = 1");
echo '<pre>';
print_r($clientes);
echo '</pre>';
 */