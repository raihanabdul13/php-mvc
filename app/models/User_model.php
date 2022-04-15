<?php

class User_model
{
    private $nama = 'Raihan Abdul Qoshid';
    private $IdMagang = '1560181';
    private $posisi = 'Web Developer';

    public function getUser()
    {
        return $this->nama;
    }
    public function getId()
    {
        return $this->IdMagang;
    }
    public function getPosition()
    {
        return $this->posisi;
    }
}
