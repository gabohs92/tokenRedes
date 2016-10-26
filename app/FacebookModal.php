<?php

namespace sesionfacebook;

use Illuminate\Database\Eloquent\Model;

class FacebookModal extends Model
{
    protected $fillable = ['idUsuario', 'idProveedor', 'proveedor'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
