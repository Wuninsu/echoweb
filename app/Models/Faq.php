<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['question', 'answer', 'is_active'];

    static public function faqData()
    {
        return Faq::where('is_active', true)->get();
    }
}
