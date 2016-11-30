<?php
  ob_start();
?>
  <div class="row">
    <div class="input-field col s6">
      <input id="nome" name="nome" type="text" class="validate" value="<?php echo $nome ?>">
      <label for="nome">Nome</label>
    </div>
  </div>
<?php
  $form_compl = ob_get_clean();
  include 'add_monster.php';
?>