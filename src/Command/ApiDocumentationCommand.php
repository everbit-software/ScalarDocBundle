<?php

namespace Everbit\Bundle\ScalarDocBundle\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

#[AsCommand('api:docs:generate', description: 'Generate Open API documentation for the visual documentation')]
class ApiDocumentationCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filesystem = new Filesystem();

        // Create directory
        $filesystem->mkdir('/app/public_html/openapi/');

        // Run the OpenAPI schema generate/export command
        $process = new Process(['bin/console', 'api:openapi:export']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Write to file
        file_put_contents('/app/public_html/openapi/spec.json', $process->getOutput());

        $output->writeln('OpenAPI documentation generated successfully.');

        return Command::SUCCESS;
    }
}
