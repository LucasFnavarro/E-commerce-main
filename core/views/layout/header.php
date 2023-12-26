<?php
use core\classes\Store;
?>

<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
                <h3><?= APP_NAME ?></h3>

        </div>
        <div class="col-6 text-end p-3 menu">

            <a href="?a=inicio">Inicio</a>
            <a href="?a=loja">Produtos</a>

            <!-- CHECK IF YOU HAVE A CLIENT IN THE SESSION -->
            <?php
            if (Store::clienteLogado()) : ?>
                <a href="?a=minha_conta">Minha conta</a>
                <a href="?a=logout">Sair</a>
            <?php else : ?>
                <a href="?a=criar_cliente">Criar conta</a>
                <a href="?a=login">Entrar</a>
            <?php endif; ?>
            <a href="?a=carrinho"><i class="fas fa-shopping-cart"><span class="badge bg-warning">10</span></i></a>
        </div>

    </div>
</div>