<?php

function collectionToString($collection)
{
    /*
    $myArray=[];
    foreach($collection as $member){
        $myArray[]=$member->id;
    }
    */
    return '['.implode(',',collectionToArrayId($collection)).']';
}

function collectionToArrayId($collection){
    $myArray=[];
    foreach($collection as $member){
        $myArray[]=$member->id;
    }
    return $myArray;
}

