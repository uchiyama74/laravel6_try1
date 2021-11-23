<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\MySrv2Service;
use App\NameItem;

class MyCmd1Command extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-cmd1 {nameItem : NameItemのID} {yyyymmdd : 年月日} {--y|yes : 確認事項を全てYES}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is my command named my-cmd1.';

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
    public function handle(MySrv2Service $mySrv2Service)
    {
        if (!$this->option('yes') &&
            !$this->confirm("「my-cmd1」コマンドを実行しますか？」")) {
            $this->info("「my-cmd1」コマンドを実行しませんでした。");
            return 0;
        }

        $nameItemId = $this->argument('nameItem');
        $yyyymmdd = $this->argument('yyyymmdd');

        $nameItem = NameItem::find($nameItemId);
        if (!$nameItem) {
            $this->error("引数「nameItem：{$nameItemId}」が不正です。");
            return 1;
        }

        if (preg_match('/\A[0-9]{8}\z/u', $yyyymmdd) !== 1) {
            $this->error("引数「yyyymmdd：{$yyyymmdd}」が不正です。");
            return 1;
        }

        $result = $mySrv2Service->getDateText($yyyymmdd);

        $this->line("引数は「nameItem；{$nameItem->c_name}」でした。\n");

        $this->line("引数は「yyyymmdd：{$yyyymmdd}」でした。");
        $this->info("その結果は「{$result}」です。");
        return 0;
    }
}
