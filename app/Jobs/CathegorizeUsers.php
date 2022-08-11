<?php

namespace App\Jobs;

use App\Domains\Auth\Models\User;
use App\Models\userinf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Bus\SelfHandling;

class CathegorizeUsers implements ShouldQueue, SelfHandling
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	protected $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
		$this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->attempts() > 3)
			dd("Anti-spam protection");

		$userinf = new userinf;
		$userinf->user_id = $this->user->id;
		$userinf->role = "Por definir";
		$userinf->save();
    }
}
