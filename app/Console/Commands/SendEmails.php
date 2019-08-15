<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:echo {id} {--test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试一下console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //执行处理
//        $this->call('migrate');
        $id = $this->argument('id');
        echo $id;
        $name = $this->ask('what is your name?');
        echo $name;
        if ($this->confirm('Do you wish to continue? [y|N]')) {
            echo 'yes';
        }
        $this->info('study console command');
    }
}
