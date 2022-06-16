<?php

namespace App\Command;

use App\Enum\Gender;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:enum',
    description: 'output enum values',
)]
final class EnumCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->text(get_class(Gender::MALE()));
        $io->text(Gender::MALE()->getValue());

        return Command::SUCCESS;
    }
}
