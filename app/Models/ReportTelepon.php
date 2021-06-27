<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTelepon extends Model
{
    use HasFactory;
    protected $table = "laporan_telepon";
    protected $fillable = [
        'user_id',
        'tipe_laporan', 
        'nama_terlapor', 
        'nomor_telepon', 
        'kronologi', 
        'total_kerugian', 
        'created_at', 
        'updated_at'
    ];
}
