<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Serve the application using the PHP built-in server';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting Laravel development server: http://localhost:8000');
        
        $startNode = new Process(['node', 'server.js']);
        $startNode->start();

        $startPhp = new Process(['php', '-S', '0.0.0.0:8000', '-t', 'public']);
        $startPhp->setTimeout(null);
        $startPhp->run(function ($type, $line) {
            $this->output->write($line);
        });

        $this->stopServers($startNode, $startPhp);
    }

    /**
     * Stop servers when the command is terminated.
     *
     * @param Process $nodeProcess
     * @param Process $phpProcess
     * @return void
     */
    protected function stopServers(Process $nodeProcess, Process $phpProcess)
    {
        $this->info('Stopping servers...');
        
        $nodeProcess->stop(5, SIGINT);
        $phpProcess->stop(5, SIGINT);
        
        $this->info('Servers stopped.');
    }
}
