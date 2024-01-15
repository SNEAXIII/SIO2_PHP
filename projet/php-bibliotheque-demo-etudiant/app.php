<?php

require_once "./vendor/autoload.php";

use Silly\Application;
use Symfony\Component\Console\Output\OutputInterface;

//Definir les commandes
$app = new Application();

$app->command(
    'greet [name] [--yell]',
    function (
        $name,
        $yell,
        OutputInterface $output) {
        $text = $name ? "Hello, $name" : "Hello";

        if ($yell) {
            $text = strtoupper($text);
        }

        $output->writeln($text);
    });
$app->command(
    'test',
    callable: function (Symfony\Component\Console\Style\SymfonyStyle $io
    ) {
        $io->title("test");
        $io->text("test");
        $io->note("test");
        $io->error("test");
        $io->note("test");
//        $io->ask("test");
        $io->horizontalTable(
            ['Header 1', 'Header 2'],
            [
                ['Cell 1-1', 'Cell 1-2'],
                ['Cell 2-1', 'Cell 2-2'],
                ['Cell 3-1', 'Cell 3-2'],
            ]
        );
//        $io->choice('Select the queue to analyze', ['queue1', 'queue2', 'queue3']);

        $io->success("HEHE");
    }
);

$app->run();

