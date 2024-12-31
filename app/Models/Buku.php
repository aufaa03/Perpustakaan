<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kategori_id', 'judul', 'penulis', 'penerbit', 'tahun', 'isbn', 'jumlah'];

    public function kategori():belongsTo
    {
        return $this->belongsTo(Kategori::class);
    }
}
