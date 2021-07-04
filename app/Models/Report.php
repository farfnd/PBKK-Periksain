<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'terverifikasi', 'tipe_laporan', 'nama_terlapor', 'bank', 'nomor_rekening', 'platform', 'kontak_pelaku', 'kronologi', 'total_kerugian', 'file_bukti', 'created_at', 'updated_at'];
}
