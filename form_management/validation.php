<?php

function html($str)
{
    // nettoyage des balises html et des espaces dans les entrées du formulaire
    return htmlspecialchars(trim($str), ENT_QUOTES);
}

function mb_ucfirst($string)
{
    // première lettre en majuscule et le reste en minuscule
    $string = mb_strtolower($string);
    return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
}
