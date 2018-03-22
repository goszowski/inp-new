<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Runsite\CMF\Models\Node\Node;

class GeneratePages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        for($i=0; $i<3000; $i++)
        {
            $node = Node::create([
                'model_id' => 4,
                'parent_id' => 1,
            ]);

            $day = mt_rand(1, 31);

            if($day < 10)
                $day = '0'.$day;

            $month = mt_rand(1, 12);

            if($month < 10)
                $month = '0'.$month;

            $node->baseNode->created_at = date('2017-'.$month.'-'.$day.' H:i:s');
            $node->baseNode->save();
        }
    }
}
