<?php 

function datosPersonalesAcademicoArray($member)
{
    if(is_null($member))
    {
        return [];
    }

    return array(
        'nombre' => $member->persona->full_name(),//clase persona
        'email' => $member->persona->email,
        'area' => $member->area,
    );

}

function datosPersonalesHTML($member)
{
    return "<p>". $member->persona->full_name()."</p>"."<p>". $member->persona->email."</p>"."<p>". $member->area."</p>";
}