<?php

namespace App\Console\Commands;

use App\Services\PullAreasService;
use Illuminate\Console\Command;

final class PullAreasCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'app:pull-areas';

    /**
     * @var string
     */
    protected $description = 'Seed the database with fetched areas from the hh api';

    public function handle(PullAreasService $service): int
    {
        $bar = $this->output->createProgressBar();
        $bar->start();

        $count = $service->run(static function () use ($bar): void {
            $bar->advance();
        });

        $bar->finish();

        $this->output->info("Pulled $count cities");

        return self::SUCCESS;
    }
}
