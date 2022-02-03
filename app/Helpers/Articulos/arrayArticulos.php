<?php

function articulosToString($collection)
{
    if ($collection->isEmpty()) {
        return [];
    }

    $losArticulos = [];
    foreach ($collection as $member) {
        $losArticulos[] = $member->autoresCompact() . '. ' . $member->titulo . '. ' . $member->revista->nombre . '(' . $member->year . ').';
    }

    return $losArticulos;
}

function articulosHTML($collection, $direction)
{
    $losArticulosHTML = '';
    if ($direction == 'latest') {
        foreach ($collection as $member) {
            $losArticulosHTML = $losArticulosHTML . "<p><b>" . $member->autoresNoLink() . "</b>. " . $member->titulo . '. ' . $member->revista->nombre . '(' . $member->fecha_publicacion . ").</p>";
        }
    } else {
        foreach ($collection as $member) {
            $losArticulosHTML = "<p><b>" . $member->autoresNoLink() . "</b>. " . $member->titulo . '. ' . $member->revista->nombre . '(' . $member->fecha_publicacion . ").</p>" . $losArticulosHTML;
        }
    }

    return $losArticulosHTML;
}
