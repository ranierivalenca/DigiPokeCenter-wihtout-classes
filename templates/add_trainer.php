<div class="container">
  <div class="section">

    <div class="row">
      <div class="col s12">
        <nav>
          <div class="nav-wrapper blue lighten-2">
            <div class="col s12">
              <a href="<?php echo url('') ?>" class="breadcrumb">home</a>
              <a href="<?php echo url('trainers') ?>" class="breadcrumb">Treinadores</a>
              <a href="#" class="breadcrumb">Novo treinador</a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="row">
      <form action="<?php echo url('trainers', 'add') ?>" method="POST">
        <div class="col s4">
          <h3 class="header">Tipo de treinador</h3>
          <p>
            <input class="with-gap validate" name="type" value="DIGIMON" type="radio" id="Digimon" <?php echo ($type == 'DIGIMON') ? 'checked="checked"' : '' ?> />
            <label for="Digimon">Digimon</label>
          </p>
          <p>
            <input class="with-gap validate" name="type" value="POKEMON" type="radio" id="Pokemon" <?php echo ($type == 'POKEMON') ? 'checked="checked"' : '' ?> />
            <label for="Pokemon">Pokemon</label>
          </p>
        </div>
        <div class="col s8">
          <div class="row">
            <div class="input-field col s6">
              <input id="nome" name="nome" type="text" class="validate" value="<?php echo $nome ?>">
              <label for="nome">Nome</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="sobrenome" name="sobrenome" type="text" class="validate" value="<?php echo $sobrenome ?>">
              <label for="sobrenome">Sobrenome</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s6">
              <input id="idade" name="idade" type="number" min="10" max="100" class="validate" value="<?php echo $idade ?>">
              <label for="idade">Idade</label>
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