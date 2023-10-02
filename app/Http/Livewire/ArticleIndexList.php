<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndexList extends Component
{
    public function render()
    {
        return view('livewire.article-index-list', ['articles' => Article::all()]);
    }
}
