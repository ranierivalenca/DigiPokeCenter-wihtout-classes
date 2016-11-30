<?php
  $digiTrainers = [
    new DigiTrainer('Trista', 'Sonka', 25),
    new DigiTrainer('Marjory', 'Norales', 20),
    new DigiTrainer('Malvina', 'Rieth', 38),
    new DigiTrainer('Coletta', 'Archambault', 38),
    new DigiTrainer('Pearlene', 'Arduini', 24),
    new DigiTrainer('Junie', 'Pross', 28),
    new DigiTrainer('Milan', 'Palazzola', 29),
    new DigiTrainer('Sarina', 'Rowback', 22),
    new DigiTrainer('David', 'Maeno', 37),
    new DigiTrainer('Dorie', 'Lints', 21),
  ];

  $pokeTrainers = [
    new PokeTrainer('Ray', 'Sonka', 23),
    new PokeTrainer('Debbi', 'Norales', 35),
    new PokeTrainer('Shondra', 'Rieth', 23),
    new PokeTrainer('William', 'Archambault', 24),
    new PokeTrainer('Jere', 'Arduini', 36),
    new PokeTrainer('Marquis', 'Pross', 23),
    new PokeTrainer('Angelo', 'Palazzola', 34),
    new PokeTrainer('Darcie', 'Rowback', 36),
    new PokeTrainer('Buford', 'Maeno', 21),
    new PokeTrainer('Gabriela', 'Lints', 31),
    new PokeTrainer('Geoffrey', 'Sonka', 27),
    new PokeTrainer('Wesley', 'Norales', 36),
    new PokeTrainer('Lin', 'Rieth', 31),
    new PokeTrainer('Kaitlin', 'Archambault', 39),
    new PokeTrainer('Booker', 'Arduini', 22),
    new PokeTrainer('Youlanda', 'Pross', 24),
    new PokeTrainer('Lynnette', 'Palazzola', 38),
    new PokeTrainer('Morton', 'Rowback', 39),
    new PokeTrainer('Evangeline', 'Maeno', 24),
    new PokeTrainer('Serafina', 'Lints', 23),
  ];

  $pokemons = [
    'Água' => ['Squirtle', 'Blastoise', 'Magikarp', 'Lapras', 'Sprinkler'],
    'Fogo' => ['Charmander', 'Charizard', 'Arcanine', 'Moltres', 'Brasinha'],
    'Planta' => ['Bulbasaur', 'Ivysaur', 'Chikorita', 'Scyther', 'Trepadeira'],
    'Luta' => ['Hitmonlee', 'Hitmonchan', 'Popo'],
    'Psiquico' => ['Abra', 'Kadabra', 'Mew', 'Mewtwo', 'Adivinho'],
    'Trevas' => ['Gengar', 'Abysol', 'Trevoso']
  ];

  $digimons = [
    'Garurumon',
    'Sauromon',
    'Angelmon',
    'Pokemon',
    'Safadomon',
    'Fogomon',
    'Croftmon'
  ];

  foreach($pokeTrainers as $trainer) {
    $r = rand(1, 7);
    for ($i = 0; $i < $r; $i++) {
        $tipo = array_rand($pokemons);
        $especie = $pokemons[$tipo][array_rand($pokemons[$tipo])];
        $trainer->addMonster(new Pokemon($especie, $tipo, $especie, rand(30, 90)));
    }
  }

  foreach($digiTrainers as $trainer) {
    $r = rand(1, 7);
    for ($i = 0; $i < $r; $i++) {
        $nome = $digimons[array_rand($digimons)];
        $trainer->addMonster(new Digimon($nome, $nome, rand(30, 90)));
    }
  }

  $trainers = array_merge($pokeTrainers, $digiTrainers);
  shuffle($trainers);
  foreach($trainers as $trainer) {
    $_SESSION['trainers'][] = $trainer;
}
?>