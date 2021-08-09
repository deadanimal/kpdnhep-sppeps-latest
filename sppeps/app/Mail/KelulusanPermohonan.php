<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\Permohonan;

class KelulusanPermohonan extends Mailable
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
        if($this->permohonan->status_permohonan == "Diluluskan"){
            return $this->view('email.permohonan-diluluskan')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan,
                'nama'=>$this->permohonan->nama,
                'no_kp'=>123,
                'tempoh_kelulusan'=>1,
                'bayaran_fi'=>123
            ]);
        } else if($this->permohonan->status_permohonan == "Tidak Diluluskan"){
            return $this->view('email.permohonan-ditolak')->with([
                'jenis_permohonan'=>$this->permohonan->jenis_permohonan,
            ]);
        }

        
    }
}
