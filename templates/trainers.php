
<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12">
        <nav>
          <div class="nav-wrapper blue lighten-2">
            <div class="col s12">
              <a href="<?php echo url('') ?>" class="breadcrumb">home</a>
              <a href="#" class="breadcrumb">Treinadores</a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col s6 m4">
        <div class="card">
          <a href="<?php echo url('trainers', 'add') ?>">
            <div class="card-content <?php echo $COLORS['trainer']['bg'] . ' ' . $COLORS['trainer']['fg'] ?>">
              <span class="card-title">Novo treinador</span>
            </div>
            <div class="card-action">
              &nbsp;
            </div>
          </a>
        </div>
      </div>
      <?php foreach ($_SESSION['trainers'] as $id => $trainer): ?>
      <?php
        $colors = $COLORS[is_a($trainer, 'DigiTrainer') ? 'digitrainer' : 'poketrainer'];
        $bg = $colors['bg'];
        $fg = $colors['fg'];
        $b_bg = $colors['contrast-bg'];
        $b_fg = $colors['contrast-fg'];

        $monsterType = is_a($trainer, 'DigiTrainer') ? 'Dgmn' : 'Pkmn';
      ?>
        <div class="col s6 m4">
          <div class="card">
              <div class="card-content white-text <?php echo $bg ?>">
                <span class="card-title <?php echo $fg ?>">
                  <?php echo substr($trainer->getNome() . ' ' . $trainer->getSobrenome(), 0, 30) ?>
                  <span class="new badge <?php echo $b_bg . ' ' . $b_fg ?>" data-badge-caption="<?php echo $monsterType ?>"><?php echo count($trainer->getMonsters()) ?></span>
                </span>
              </div>
              <div class="card-action right-align">
                <a href="<?php echo url('trainers', 'view', $id) ?>">
                  Ver / Editar
                </a>
                <a href="<?php echo url('trainers', 'remove', $id) ?>" class="remove" data-name="<?php echo $trainer->getNome() . ' ' . $trainer->getSobrenome() ?>">
                  Remover
                </a>
              </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<script>
  $('.remove').on('click', function(e) {
    var name = $(e.target).attr('data-name');
    if (!confirm("Tem certeza que deseja remover o treinador [" + name + "]")) {
      e.preventDefault();
    }
  });
</script>
