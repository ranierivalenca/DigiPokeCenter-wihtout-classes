
<div class="container">
  <div class="section">
    <div class="row">
      <div class="col s12">
        <nav>
          <div class="nav-wrapper blue lighten-2">
            <div class="col s12">
              <a href="<?php echo url('') ?>" class="breadcrumb">home</a>
              <a href="#" class="breadcrumb">Duelos</a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="row">

      <?php for($i = 0; $i < 3; $i++): ?>
        <?php if ($i % 2 == 0): ?>
          <div class="col s4">
            <div class="row">
              <?php
                // if($i == 2) { $trainers = array_reverse($trainers, true); }
              ?>
              <?php foreach ($trainers as $id => $trainer): ?>
              <?php
                $colors = $COLORS[is_a($trainer, 'DigiTrainer') ? 'digitrainer' : 'poketrainer'];
                $bg = $colors['bg'];
                $fg = $colors['fg'];
                $b_bg = $colors['contrast-bg'];
                $b_fg = $colors['contrast-fg'];

                $monsterType = is_a($trainer, 'DigiTrainer') ? 'Dgmn' : 'Pkmn';
                $totalPower = Utils::trainerPower($trainer);
                $monsters = $trainer->getMonsters();
                uasort(
                  $monsters,
                  function($m1, $m2) {
                    return $m2->poderTotal() - $m1->poderTotal();
                  }
                );
                $top3 = array_slice(array_merge($monsters, [null, null]), 0, 3);
              ?>
                <div class="col s12">
                  <a href="#" class="add-trainer-<?php echo $i ?>" data-trainer-id="<?php echo $id ?>">
                    <div class="card inactive">
                        <div class="card-content white-text <?php echo $bg ?>">
                          <span class="card-title <?php echo $fg ?>">
                            <?php echo substr($trainer->getNome() . ' ' . $trainer->getSobrenome(), 0, 30) ?>
                            <span class="new badge <?php echo $b_bg . ' ' . $b_fg ?>" data-badge-caption="">
                              <?php echo count($trainer->getMonsters()) . ' ' . $monsterType ?> / Pwr: <strong><?php echo $totalPower ?></strong>
                            </span>
                          </span>
                        </div>
                        <div class="card-action right-align">
                          <div class="row">
                            <?php foreach ($top3 as $monster): ?>
                              <div class="col s6 left-align">
                                <?php if (!is_null($monster)): ?>
                                  <?php echo $monster->getApelido() ?> <br>
                                  Lvl: <?php echo $monster->getLevel() ?> / Pwr: <?php echo $monster->poderTotal() ?> / XP: <?php echo $monster->getXp() ?>
                                <?php else: ?>
                                  &nbsp;<br>&nbsp;
                                <?php endif ?>
                              </div>
                            <?php endforeach ?>
                          </div>
                        </div>
                    </div>
                  </a>
                </div>
              <?php endforeach ?>
            </div>
          </div>

        <?php else: ?>

          <div class="col s4">
            <div class="row challengers">
              <div class="col s12" id="trainer-0">
                <div class="empty-card">&nbsp;</div>
              </div>

              <div class="col s12 center-align">VS</div>

              <div class="col s12" id="trainer-2">
                <div class="empty-card">&nbsp;</div>
              </div>

              <div class="col s12 center-align">
                <button class="btn waves-effect red disabled" id="fight-btn">
                  Fight!
                </button>
              </div>
            </div>
          </div>

        <?php endif ?>
      <?php endfor ?>

    </div>
  </div>
</div>
<script>
  $(document).ready(function(){

    var t_id = [];

    var fightReady = function() {
      var has_0 = $('#trainer-0 > .card').length > 0;
      var has_2 = $('#trainer-2 > .card').length > 0;
      return has_0 && has_2;
    }

    var addTrainerListener = function(id) {
      $('.add-trainer-' + id).on('click', function(e) {
        e.preventDefault();
        var trainer_id = $(this).attr('data-trainer-id');
        t_id[id] = trainer_id;

        $('.add-trainer-' + id + ' > .card')
          .removeClass('active')
          .addClass('inactive');

        $(this).children('.card')
          .removeClass('inactive')
          .addClass('active');

        $('#trainer-' + id).empty();
        $(this).children('.card')
               .clone().removeClass('active')
                       .removeClass('inactive')
                       .appendTo('#trainer-' + id);

        if (fightReady()) {
          $('#fight-btn').removeClass('disabled');
        }
      });
    }
    addTrainerListener(0);
    addTrainerListener(2);

    $('#fight-btn').on('click', function() {
      $.ajax({
        type: 'POST',
        url: "<?php echo url('duels', 'fight') ?>",
        data: {
          't0': t_id[0],
          't2': t_id[2]
        },
        success: function(response) {

        }
      })
    });

    $(window).on('scroll', function(evt) {
      $('.challengers').css('top', window.scrollY);
    });
    $('.challengers').css('top', window.scrollY);

  });

</script>
