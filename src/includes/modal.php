 <div class="fade hidden"></div>

<form action="./src/actions/update.php" method="post" class="modal hidden">
  <header>
    <h3>Atualizar usuário</h3>
    <button type="button" class="close">&times;</button>
  </header>
  <div class="body">
    <input type="hidden" name="update-id">
    <label for="update-name">Nome</label>
    <input type="text" name="update-name" >
    <label for="update-email">E-mail</label>
    <input type="email" name="update-email" >
    <label for="update-phone">Telefone</label>
    <input type="text" name="update-phone" >
  </div>
  <footer>
    <button class="button submit" name="submit-update" type="submit">Editar</button>
  </footer>
</form>
