<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';

    protected $fillable = ['nama_lomba', 'lokasi_lomba', 'tanggal_lomba'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $maxId = Contest::max('id');
                $model->{$model->getKeyName()} = $maxId ? $maxId + 1 : 1;
            }
        });
    }

    public function participants()
    {
        return $this->hasMany(Participant::class, 'id_lomba');
    }

    public function judges()
    {
        return $this->hasOne(Judge::class, 'id_lomba');
    }
}
