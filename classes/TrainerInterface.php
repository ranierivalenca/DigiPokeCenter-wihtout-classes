<?php
interface TrainerInterface {
    function __construct($nome, $sobrenome, $idade);

    /*
        - As regras do duelo são as seguintes:
            - "Num duelo entre treinadores Digimon, ganha o Digimon com maior poder total"
            - "Num duelo entre treinadores Pokemon, ganha o Pokemon com maior
              (poder total * modificador de tipo)"
            - "Num duelo entre um PokeTrainer e um DigiTrainer, ganha o monstro (Pokemon ou Digimon)
              com maior poder total"
        - A xp é ganha conforme a seguinte regra:
            - "O ganhador ganha experiência equivalente ao dobro do level do perdedor e o
              perdedor ganha experiência equivalente à metade de seu próprio level."
    */
    function duelar(TrainerInterface $trainer);

    function setNome($nome);
    function getNome();

    function setSobrenome($sobrenome);
    function getSobrenome();

    function setIdade($idade);
    function getIdade();

    function getMonsters();
}
?>