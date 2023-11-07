<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require "bootstrap.php";

/**
 * @var \Doctrine\ORM\EntityManager $entityManager
 */

ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);