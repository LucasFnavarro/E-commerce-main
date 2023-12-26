<?php


# ============================================================== #

# Significa que quando encontrar inicio na query string(URL)
# Ele carrega o controlador main e em seguida executa o método index


# ============================================================== #

# Collection of all routes
$routes = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
    'clientes' => 'main@clientes',
    'carrinho' => 'main@carrinho'
];

# Defines an action if a defect occurs  
$actions = 'inicio';

# Checks the query string if the action exists
if (isset($_GET['a'])) {

    # Checks if the action exists in the routes
    if (!key_exists($_GET['a'], $routes)) {
        $actions = 'inicio';
    } else {
        $actions = $_GET['a'];
    }
}

# It will handle route definitions
$parts = explode('@', $routes[$actions]);
$controller = 'core\\controllers\\' . ucfirst($parts[0]);
$method = $parts[1];

$ctr = new $controller();
$ctr->$method();
