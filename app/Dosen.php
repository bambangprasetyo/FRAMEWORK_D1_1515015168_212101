<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'Dosen';
    protected $fillable = ['nama','nip','alamat','pengguna_id'];

    public function pengguna()
   {
    return $this->belongsTo(pengguna::class);
   }
   public function dosen_matakuliyah()
   {
    return $this->hasMany(dosen_matakuliyah::class);
   }
   public function listDosenDanNip()
   {
      $out = [];
      foreach ($this->all() as $dsn) {
         $out[$dsn->id] = "{$dsn->nama} ({$dsn->nip})";
      }
      return $out;
   }
   public function getUsernameAttribute(){
        return $this->pengguna->username;
    }
}