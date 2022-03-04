<?php
header('Content-type: text/html; charset=utf8');
setlocale(LC_ALL,'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');
echo $this->extend('site/layout/default');
echo $this->section('content');
   echo view("site/home/section-main");
   echo view("site/home/curiosities");
   echo view("site/home/emphasis");
   echo view('site/home/varieteis');  
   echo view("site/home/utils.php"); 
echo  $this->endSection();
