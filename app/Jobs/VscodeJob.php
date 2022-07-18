<?php

namespace App\Jobs;

use App\Models\Vscode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class VscodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public Vscode $vscode;
    public array $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Vscode $vscode, $data)
    {
        $this->vscode = $vscode;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->vscode->settings()->create($this->data);
    }
}
