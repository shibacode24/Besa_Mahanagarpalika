<?php

namespace App\Models\Serve;

use App\Models\Master\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllUplodedDocument extends Model
{
    use HasFactory;
    protected $table="all_uploaded_document";
    protected $fillable = [
   'survey_no',
   'document_id',
   'document'
    ];

    public function get_document_name()
    {
        return $this->hasOne(Document::class, 'id' , 'document_id');
    }
}
