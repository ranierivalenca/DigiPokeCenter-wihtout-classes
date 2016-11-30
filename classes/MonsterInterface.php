<?php
interface MonsterInterface {
    function __construct($apelido, $poderInicial);

    /*
        Calculado pela fórmula:
        poder total = ((poder inicial) + (poder inicial) * (level atual) * (level atual) / 5)
    */
    function poderTotal();

    function setApelido($apelido);
    function getApelido();

    function setLevel($level);
    function getLevel();

    function setXp($xp);
    function getXp();
}
?>