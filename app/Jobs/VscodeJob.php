<?php

namespace App\Jobs;

use App\Models\Vscode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

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
        $this->data['file'] = strrev(explode('\\', strrev($this->data['file']))[0]);
        $this->vscode->settings()->create($this->data);
    }
}
