<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Judge extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';

    protected $fillable = ['id_lomba', 'nama_juri', 'alamat_juri', 'email_juri', 'no_hp'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $maxId = Judge::max('id');
                $model->{$model->getKeyName()} = $maxId ? $maxId + 1 : 1;
            }
        });
    }
    
    public function contest()
    {
        return $this->belongsTo(Contest::class, 'id_lomba');
    }
}
