<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRekening extends Model
{
    use HasFactory;
    protected $table = "laporan_rekening";
    protected $fillable = [
        'user_id',
        'tipe_laporan', 
        'nama_terlapor', 
        'bank', 
        'nomor_rekening', 
        'platform', 
        'kontak_pelaku', 
        'kronologi', 
        'total_kerugian', 
        'created_at', 
        'updated_at'
    ];
}
