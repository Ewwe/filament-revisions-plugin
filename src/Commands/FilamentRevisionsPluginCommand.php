<?php

namespace Ewwe\FilamentRevisionsPlugin\Commands;

use Illuminate\Console\Command;

class FilamentRevisionsPluginCommand extends Command
{
    public $signature = 'skeleton';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
