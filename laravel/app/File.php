<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'text_files';
    protected $primaryKey = 'file_id';
    protected $fillable = ['text_id', 'file_reference', 'description'];

    public function text()
    {
    	return $this->belongsTo(Text::class, 'text_id');
    }
}
