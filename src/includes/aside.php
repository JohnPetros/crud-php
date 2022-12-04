<aside>
    <header>Adicionar Usuário</header>
    <form action="./src/actions/create.php" method="post">
        <input type="text" name="name" placeholder="Nome" required value="<?= isset($_SESSION["user-info"]) ? $_SESSION["user-info"]["name"] : '' ?>" />
        <input type="email" name="email" placeholder="E-mail" required value="<?= isset($_SESSION["user-info"]) ? $_SESSION["user-info"]["email"] : '' ?>" />
        <input type="text" name="phone" placeholder="Telefone" required value="<?= isset($_SESSION["user-info"]) ? $_SESSION["user-info"]["phone"] : '' ?>" />
        <button type="submit" name="submit" class="button submit">Enviar</button>
    </form>
</aside>
