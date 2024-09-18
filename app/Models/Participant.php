<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';

    protected $fillable = ['id_lomba', 'nama_peserta', 'jurusan', 'email_peserta', 'no_hp'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $maxId = Participant::max('id');
                $model->{$model->getKeyName()} = $maxId ? $maxId + 1 : 1;
            }
        });
    }

    public function contest()
    {
        return $this->belongsTo(Contest::class, 'id_lomba');
    }
}
