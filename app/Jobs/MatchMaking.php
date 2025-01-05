<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MatchMaking implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $otherUser;
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
     * Busca dos usuarios que estén buscando partida
     */
    private function _match()
    {
        //TODO Buscar también por lvl
        $otherUser = User::query()
                        ->where('status',2)
                        ->where('id','!=', $this->user->id)
                        ->first();
        if(!$otherUser) return false;
        return $otherUser;
    }

    public function getOutput()
    {
        return $this->otherUser;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->user->status != 2)return null;

        $otherUser = $this->_match();
        if ($otherUser) return;
    }
}
