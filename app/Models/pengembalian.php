<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengembalian extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pengembalians';
    protected $primaryKey = 'id';
    protected $fillable = ['id','pinjam_id', 'tgl_kembali', 'denda'];

    public function pinjam():belongsTo
    {
        return $this->belongsTo(pinjam::class);
    }
}
