<?php
namespace Partiel;
interface modele
{
    public function getAll();
    public function Search($id);
    public function Insert($object);
    public function Update($object,$id);
    public function Delete($id);

}