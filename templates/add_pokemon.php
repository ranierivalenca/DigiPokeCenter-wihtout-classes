<?php
  ob_start();
?>
  <div class="row">
    <div class="input-field col s6">
      <select name="tipo">
        <option value="" disabled <?php echo $tipo ? '' : 'selected' ?>>Choose your option</option>
        <?php sort($POKEMON_TYPES); ?>
        <?php foreach ($POKEMON_TYPES as $type): ?>
          <option value="<?php echo $type ?>" <?php echo $type == $tipo ? 'selected' : '' ?>><?php echo ucfirst($type) ?></option>
        <?php endforeach ?>
      </select>
      <label>Tipo</label>
    </div>
  </div>
  <div class="row">
    <div class="input-field col s6">
      <input id="especie" name="especie" type="text" class="validate" value="<?php echo $especie ?>">
      <label for="especie">Especie</label>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
<?php
  $form_compl = ob_get_clean();
  include 'add_monster.php';
?>