<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Permohonan;

class NewPermohonan extends Mailable
{
    use Queueable, SerializesModels;

    protected $permohonan;

    public function __construct(Permohonan $permohonan)
    {
        $this->permohonan = $permohonan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->permohonan->jenis_permohonan == "Baharu"){
            return $this->view('email.permohonan-baharu')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
                'nama'=>$this->permohonan->nama,
                'no_kp'=>$this->permohonan->no_kp,
            ]);
        } else if($this->permohonan->jenis_permohonan == "Pembaharuan"){
            return $this->view('email.permohonan_pembaharuan')->subject('NOTIFIKASI PERMOHONAN PEMBAHARUAN')->with([
                'nama'=>$this->permohonan->nama,
                'no_kp'=>$this->permohonan->no_kp,
            ]);
        } else if($this->permohonan->jenis_permohonan == "Pendua"){
            return $this->view('email.permohonan_pendua')->subject('NOTIFIKASI PERMOHONAN PENDUA')->with([
                'nama'=>$this->permohonan->nama,
                'no_kp'=>$this->permohonan->no_kp,
            ]);
        } else if($this->permohonan->jenis_permohonan == "Rayuan"){
            return $this->view('email.permohonan_rayuan')->subject('NOTIFIKASI PERMOHONAN RAYUAN')->with([
                'nama'=>$this->permohonan->nama,
                'no_kp'=>$this->permohonan->no_kp,
            ]);
        }
    }
}
