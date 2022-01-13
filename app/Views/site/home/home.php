<?php
echo $this->extend('site/layout/default');
echo $this->section('content');
   echo view("site/home/section-main");
   echo view("site/home/curiosities");
   echo view("site/home/emphasis");
   echo view('site/home/varieteis');   
echo  $this->endSection();
