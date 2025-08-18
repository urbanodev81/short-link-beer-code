<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ClearAllCmd extends Command
{
    protected $signature = 'clear:all:cmds';
    protected $description = 'Limpa cache, configurações e regenera o autoload do Composer';

    public function handle()
    {
        Artisan::call('cache:clear');
        $this->info('✅ Cache limpo!');

        Artisan::call('config:clear');
        $this->info('✅ Configurações limpas!');

        shell_exec('composer dump-autoload');
        $this->info('✅ Composer autoload regenerado!');

        return 0;
    }
}
