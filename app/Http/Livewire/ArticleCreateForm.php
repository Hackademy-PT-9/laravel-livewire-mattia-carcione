<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleCreateForm extends Component
{
    public $title, $subtitle, $body;

    protected $rules = [
        'title' => 'required|string',
        'subtitle' => 'nullable|string',
        'body' => 'required|string'
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.article-create-form');
    }

    public function store()
    {
        $this->validate();
        Article::create([
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'body' => $this->body
        ]);
        $this->reset('title', 'subtitle', 'body');
        // session()->flash('message', 'Articolo creato con successo');
        return redirect()->route('articles.index')->with('message', 'Articolo creato con successo');
    }
}