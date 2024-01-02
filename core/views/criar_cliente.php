<div class="container">
    <div class="row my-5">
        <div class="col-sm-6 offset-sm-3">
            <div class="text-center">
                <h3>Criar uma nova Conta</h3><br>

                <form action="?a=criar_client_submit" method="post">

                <?php if(isset($_SESSION['erro'])) : ?>
                        <div class="alert alert-danger text-center p-2">
                            <?= $_SESSION['erro']; ?>
                            <?php  unset($_SESSION['erro']); ?>
                        </div>
                        <?php endif;?>

                        <?php ?><br>

                    <div class="mb-3">
                        <label>E-mail</label>
                        <input type="email" name="text_email" require placeholder="Email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Crie uma senha</label>
                        <input type="password" name="text_senha_1" require placeholder="Crie uma senha forte" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Confirme a senha</label>
                        <input type="password" name="text_senha_2" require placeholder="Confirme sua senha" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Nome completo</label>
                        <input type="text" name="text_nome_completo" require placeholder="Nome completo" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Endereço</label>
                        <input type="text" name="text_endereco" require placeholder="Coloque seu endereço" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Cidade</label>
                        <input type="text" name="text_cidade" require placeholder="Cidade" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Contato</label>
                        <input type="text" name="text_contato" require placeholder="Telefone de contato" class="form-control">
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Criar conta" class="btn btn-primary">
                    </div>

                </form>




            </div>
        </div>
    </div>
</div>


<?php
/*
	email * 
	senha_1 * 
    senha_2 * 
	nome_completo * 
	endereco *
	cidade * 
	contato
    */
?>