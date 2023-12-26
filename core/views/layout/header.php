<?php
use core\classes\Store;
?>

<div class="container-fluid navegacao">
    <div class="row">
        <div class="col-6 p-3">
            <a href="?a=inicio">
                <h3><?= APP_NAME ?></h3>
            </a>

        </div>
        <div class="col-6 text-end p-3 menu">

            <a href="?a=inicio">Inicio</a>
            <a href="?a=loja">Produtos</a>

            <!-- CHECK IF YOU HAVE A CLIENT IN THE SESSION -->
            <?php
            if (Store::clienteLogado()) : ?>
                <a href="">Minha conta</a>
                <a href="">Sair</a>
            <?php else : ?>
                <a href="">Criar conta</a>
                <a href="">Entrar</a>
            <?php endif; ?>
            <a href="?a=carrinho"><i class="fas fa-shopping-cart"><span class="badge bg-warning">10</span></i></a>
        </div>

    </div>
</div>