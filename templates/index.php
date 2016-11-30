<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br><br>
    <h1 class="header center orange-text text-darken-4">DigiPokeCenter</h1>
    <div class="row center">
      <h5 class="header col s12 light">Um gerenciador moderno de treinadores e seus monstros.</h5>
    </div>
    <div class="row center">
      <?php foreach ($SECTIONS as $section): ?>
          <a href="<?php echo $section['url'] ?>" id="" class="btn-large waves-effect waves-light <?php echo $section['color'] . ' ' . $section['color-text'] ?>"><?php echo $section['title'] ?></a>
      <?php endforeach ?>
    </div>
    <br><br>

  </div>
</div>
