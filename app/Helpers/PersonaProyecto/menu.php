<?php
function stringToMenu($string)
{
    if ($string == 'Asociado' || $string == 'Asociada' || $string == 'Asociado(a)') {
        return 0;
    } elseif ($string == 'Coinvestigador' || $string == 'Coinvestigadora' || $string == 'Coinvestigador(a)') {
        return 1;
    } elseif ($string == 'Colaborador' || $string == 'Colaboradora' || $string == 'Colaborador(a)') {
        return 2;
    } elseif ($string == 'Co Responsable') {
        return 3;
    } elseif ($string == 'Patrocinante' || $string == 'Patrocinador' || $string == 'Patrocinadora' || $string == 'Patrocinador(a)') {
        return 4;
    } else {
        return 5;
    }
}

function menuToString($menuValue)
{
    if ($menuValue == 0) {
        return 'Asociado(a)';
    } elseif ($menuValue == 1) {
        return 'Coinvestigador(a)';
    } elseif ($menuValue == 2) {
        return 'Colaborador(a)';
    } elseif ($menuValue == 3) {
        return 'Co Responsable';
    } elseif ($menuValue == 4) {
        return 'Patrocinante';
    } else {
        return 'Otro';
    }
}
