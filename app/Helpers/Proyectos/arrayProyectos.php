<?php

function proyectosToString($collection)
{
    if ($collection->isEmpty()) {
        return [];
    }

    $losProyectos = [];
    foreach ($collection as $member) {
        $losProyectos[] = $member->autoresCompact() . '. ' . $member->titulo . '. ';// . $member->revista->nombre . '(' . $member->year . ').';
    }

    return $losProyectos;
}

function proyectosHTML($collection, $direction)
{
    $losProyectosHTML = '';
    if ($direction == 'latest') {
        foreach ($collection as $member) {
            $losProyectosHTML = $losProyectosHTML . "<p><b>" . $member->autoresNoLink() . "</b>. " . $member->titulo . '.</p> ';// . $member->revista->nombre . '(' . $member->fecha_publicacion . ").</p>";
        }
    } else {
        foreach ($collection as $member) {
            $losProyectosHTML = "<p><b>" . $member->autoresNoLink() . "</b>. " . $member->titulo . '.</p>';// . $member->revista->nombre . '(' . $member->fecha_publicacion . ").</p>" . $losArticulosHTML;
        }
    }

    return $losProyectosHTML;
}

function proyectosArrayHTML($myArray)
{
    $stringProyectos = '';
    foreach($myArray as $row)
    {
        $stringProyectos= "<p><b>". $row['proyecto']."(". $row['fecha'].")</b>. ".$row['rol'] .". Código: ". $row['codigo'] .".</p>" . $stringProyectos;
    }
    return $stringProyectos;
}
