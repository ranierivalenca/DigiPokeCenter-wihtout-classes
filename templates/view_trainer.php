<?php
  $colors = $COLORS[is_a($trainer, 'DigiTrainer') ? 'digitrainer' : 'poketrainer'];
  $bg = $colors['bg'];
  $fg = $colors['fg'];

  $colors2 = $COLORS[is_a($trainer, 'DigiTrainer') ? 'digimon' : 'pokemon'];
  $m_bg = $colors2['bg'];
  $m_fg = $colors2['fg'];
  $m_b_bg = $colors2['contrast-bg'];
  $m_b_fg = $colors2['contrast-fg'];

  $monstersQuantity = count($trainer->getMonsters());
  $monsterType = (is_a($trainer, 'DigiTrainer') ? 'digimon' : 'pokemon');
  $monsterTypes = $monsterType .(($monstersQuantity > 1) ? 's' : '');
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
              <a href="#" class="breadcrumb"><?php echo $trainer->getNome() . ' ' . $trainer->getSobrenome() ?></a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="row">
      <div class="col s10 offset-s1 center-align">

        <div class="card">
          <div class="card-content <?php echo $bg . ' ' . $fg ?>">
            <h2 class="<?php echo $text_color ?>-color"><?php echo $trainer->getNome() ?> <?php echo $trainer->getSobrenome() ?></h2>
            <div class="row">
              <h4 class="col s6 left-align"><?php echo $monstersQuantity . ' ' . $monsterTypes ?></h4>
              <h4 class="col s6 right-align"><?php echo $trainer->getIdade(); ?> anos</h4>
            </div>
          </div>
          <div class="card-action">

            <div class="row">
              <div class="col s6">
                <div class="card">
                  <a href="<?php echo url('trainers', 'add_monster', $id) ?>">
                    <div class="card-content <?php echo $m_bg . ' ' . $m_fg ?>">
                      <span class="card-title">Novo <?php echo $monsterType ?></span>
                    </div>
                    <div class="card-action <?php echo $m_bg . ' ' . $m_fg ?>">
                      &nbsp;
                    </div>
                  </a>
                </div>
              </div>
              <?php foreach ($trainer->getMonsters() as $monster_id => $monster): ?>
                <div class="col s6">
                  <div class="card">
                    <div class="card-content <?php echo $m_bg . ' ' . $m_fg ?>">
                      <span class="card-title">
                        <?php echo $monster->getApelido() ?>
                        <?php if (is_a($monster, 'Pokemon') and $monster->getEspecie() != $monster->getApelido()): ?>
                          (<?php echo $monster->getEspecie() ?>)
                        <?php elseif (is_a($monster, 'Digimon') and $monster->getName() != $monster->getApelido()): ?>
                          (<?php echo $monster->getName() ?>)
                        <?php endif ?>
                        <span class="new badge <?php echo $m_b_bg . ' ' . $m_b_fg ?>" data-badge-caption="">
                          Pwr: <strong><?php echo $monster->poderTotal() ?></strong> / Lvl: <strong><?php echo $monster->getLevel() ?></strong>
                        </span>
                      </span>
                    </div>
                    <div class="card-action">
                      <a href="<?php echo url('trainers', 'remove_monster', $id, $monster_id) ?>" class="remove" data-apelido="<?php echo $monster->getApelido() ?>">
                        Remover
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>
</div>

<script>
  $('.remove').on('click', function(e) {
    var name = $(e.target).attr('data-apelido');
    if (!confirm("Tem certeza que deseja remover o <?php echo $monsterType ?> [" + name + "]")) {
      e.preventDefault();
    }
  });
</script>
