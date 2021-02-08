<?php

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader, ['cash' => 'var/cash/twig', 'auto_reload'=>true]);