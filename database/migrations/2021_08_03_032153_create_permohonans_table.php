<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('jenis_permohonan');
            $table->string('status_permohonan')->nullable();

            $table->string('nama')->nullable();
            $table->string('no_kp')->nullable();
            $table->string('umur')->nullable();
            $table->string('emel')->nullable();
            $table->string('jantina')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('poskod')->nullable();
            $table->string('negeri')->nullable();
            $table->string('no_telefon')->nullable();
            $table->string('negeri_kutipan_permit')->nullable();

            $table->string('pekerjaan_sekarang')->nullable();
            $table->string('tahap_pendidikan')->nullable();
            $table->string('lesen_memandu')->nullable();
            $table->string('berkerja_panel_atau_syarikat')->nullable();
            $table->string('nama_institusi_kewangan')->nullable();
            $table->string('no_telefon_institusi_kewangan')->nullable();
            $table->string('nama_panel')->nullable();
            $table->string('no_kp_panel')->nullable();
            $table->string('no_permit_panel')->nullable();
            $table->string('no_telefon_panel')->nullable();
            $table->string('skop_tugas')->nullable();
            $table->string('prosedur_peraturan_eps')->nullable();

            $table->string('no_permit')->nullable();
            $table->string('status_pekerjaan_eps')->nullable();
            $table->string('tahun_pekerjaan_eps')->nullable();
            $table->string('pekerjaan_tetap')->nullable();
            $table->string('kehadiran_kursus_eps')->nullable();
            $table->string('tahun_dihadiri')->nullable();

            $table->string('alasan_kehilangan')->nullable();
            $table->string('alasan_lain')->nullable();
            $table->string('penggantian_kali_ke')->nullable();
            $table->string('negeri_laporan_polis')->nullable();
            $table->string('no_laporan_polis')->nullable();

            $table->string('sebab_permohonan_ditolak')->nullable();
            $table->string('sebab_lain')->nullable();

            $table->string('rayuan_kali_ke')->nullable();
            $table->string('alasan_rayuan')->nullable();

            // $table->string('gambar_profil')->nullable();
            $table->string('salinan_kp_depan')->nullable();
            $table->string('salinan_kp_belakang')->nullable();
            $table->string('salinan_lesen_memandu')->nullable();
            $table->string('salinan_surat_sokongan')->nullable();
            $table->string('salinan_laporan_polis')->nullable();
            $table->string('salinan_tapisan_rekod_jenayah')->nullable();
            $table->string('salinan_sokongan_institusi_kewangan')->nullable();
            $table->string('salinan_dokumen_sokongan1')->nullable();
            $table->string('salinan_dokumen_sokongan2')->nullable();
            $table->string('salinan_dokumen_sokongan3')->nullable();

            // $table->text('sebab_kehilangan')->nullabe();
            $table->string('catatan_pegawai_negeri')->nullable();

            $table->string('catatan_pegawai_hq')->nullable();

            $table->string('rekod_jenayah')->nullable();
            $table->string('catatan_pdrm')->nullable();
            $table->string('pegawai_pdrm')->nullable();

            $table->string('sokongan')->nullable();
            $table->string('tempoh_kelulusan')->nullable();
            $table->string('catatan_penyokong')->nullable();

            $table->string('catatan_pelulus')->nullable();
            $table->string('catatan_senarai_hitam')->nullable();
            $table->date('tarikh_pengesahan')->nullable();
            $table->date('tarikh_semakan_pdrm')->nullable();
            $table->date('tarikh_sokongan')->nullable();
            $table->date('tarikh_diluluskan')->nullable();
            $table->date('tarikh_bayaran')->nullable();
            $table->date('tarikh_cetakan')->nullable();
            $table->date('tarikh_tamat_permit')->nullable();
            $table->string('bayaran_fi')->nullable();

            $table->foreignId('user_id');

        });date('Y-m-d H:i:s');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
}
