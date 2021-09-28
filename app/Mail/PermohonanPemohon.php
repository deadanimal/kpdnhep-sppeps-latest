<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Permohonan;

class PermohonanPemohon extends Mailable
{
    use Queueable, SerializesModels;

    protected $permohonan;
    /**
     * Create a new message instance.
     *
     * @return void
     */
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
        // return $this->view('email.permohonan-pemohon')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
        //     'jenis_permohonan'=>$this->permohonan->jenis_permohonan
        // ]);

        if($this->permohonan->jenis_permohonan == "Baharu"){
            return $this->view('email.permohonan-pemohon')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan
            ]);
        } else if($this->permohonan->jenis_permohonan == "Pembaharuan"){
            return $this->view('email.permohonan-pemohon')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan
            ]);
        } else if($this->permohonan->jenis_permohonan == "Pendua"){
            return $this->view('email.permohonan-pemohon')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan
            ]);
        } else if($this->permohonan->jenis_permohonan == "Rayuan"){
            return $this->view('email.permohonan-pemohon')->subject('NOTIFIKASI PERMOHONAN BAHARU')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan
            ]);
        }
    }
}
