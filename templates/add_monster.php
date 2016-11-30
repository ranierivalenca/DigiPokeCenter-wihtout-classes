<?php
  $monsterType = (is_a($trainer, 'DigiTrainer') ? 'digimon' : 'pokemon');
?>

<div class="container">
  <div class="section">

    <div class="row">
      <div class="col s12">
        <nav>
          <div class="nav-wrapper blue lighten-2">
            <div class="col s12">
              <a href="<?php echo url('') ?>" class="breadcrumb">home</a>
              <a href="<?php echo url('trainers') ?>" class="breadcrumb">Treinadores</a>
              <a href="<?php echo url('trainers', 'view', $trainer_id) ?>" class="breadcrumb"><?php echo $trainer->getNome() . ' ' . $trainer->getSobrenome() ?></a>
              <a href="#" class="breadcrumb">Adicionar <?php echo $monsterType ?></a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="row">
      <form action="<?php echo url('trainers', 'add_monster', $trainer_id) ?>" method="POST">
        <div class="col s8 offset-s2">
          <?php echo $form_compl ?>
          <div class="row">
            <div class="input-field col s6">
              <input id="apelido" name="apelido" type="text" class="validate" value="<?php echo $apelido ?>">
              <label for="apelido">Apelido</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="poder" name="poder" type="number" min="10" max="100" class="validate" value="<?php echo $poder ?>">
              <label for="poder">Poder Inicial</label>
            </div>
          </div>
          <div class="row">
            <div class="col s4">
              <button type="submit" class="btn waves-effect orange">
                Ok
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>