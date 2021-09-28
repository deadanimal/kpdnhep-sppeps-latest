<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class PendaftaranPdrm extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');

        return $this->view('email.daftar_pdrm')->subject('Pendaftaran Baharu Pegawai PDRM')->with([
            'name'=>$this->user->name,
            'idpengguna'=>$this->user->no_kp,
            'password_temp'=>'password54321'
        ]);
    }
}
