<html>
<head>
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <title>PokeDigiCenter</title>
  <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="/" class="brand-logo">DigiPokeCenter</a>
      <ul class="right hide-on-med-and-down">
        <?php foreach ($SECTIONS as $section): ?>
            <li><a href="<?php echo $section['url'] ?>"><?php echo $section['title'] ?></a></li>
        <?php endforeach ?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <?php foreach ($SECTIONS as $section): ?>
            <li><a href="<?php echo $section['url'] ?>"><?php echo $section['title'] ?></a></li>
        <?php endforeach ?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <?=$content?>

</body>
</html>