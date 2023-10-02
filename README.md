## Create

- Creo Vista e Rotta
- Creo un componente form Livewire con `php artisan make:livewire ArticleCreateForm`
- Impostiamo la parte logica con gli attributi title, subtitle e body
- Creo un form con:
    - @csrf
    - id
    - senza action
    - senza name
    - senza method
- Concetto data-binding con https://laravel-livewire.com/docs/2.x/properties#data-binding
    
    ```php
    <input type="text" class="form-control" id="title" wire:model="title">
    ```
    
- Inserisco un **`<form class="container p-5 shadow" wire:submit.prevent="store">`**

---

## Migliorie UX

- https://laravel-livewire.com/docs/2.x/flash-messages

```php
public function store()
    {
        Article::create([
            'title' => $this->title,
            'subtitle' =>  $this->subtitle,
            'body' =>  $this->body,
        ]);

        session()->flash('articles', 'Post successfully updated.');
        $this->reset(['title', 'subtitle', 'body']);
    }
```

---

## Validare i dati

- https://laravel-livewire.com/docs/2.x/input-validation

```php
protected $rules = [
    'title' => 'required',
    'subtitle' => 'required',
    'body' =>  'required',
];

//----

public function store()
{
        $this->validate();
}

//-----
@error('subtitle') <span class="error text-danger">{{ $message }}</span> @enderror
```

## Real Time Validation

- https://laravel-livewire.com/docs/2.x/input-validation#real-time-validation

```php
public function updated($propertyName)
{
    $this->validateOnly($propertyName);
}
```

## Performance

- https://laravel-livewire.com/docs/2.x/properties#debouncing-input
- Vediamo un debounce
- vediamo un lazy

# Index

- Creo Vista e Rotta
- Creo un componente form Livewire con `php artisan make:livewire ArticleIndex`
- Inserisco la tabella che ho preso da boostrato

## Edit

- Creo Vista e Rotta
- Creo un componente form Livewire con `php artisan make:livewire ArticleEditForm`
- Passi i dati nel form https://laravel-livewire.com/docs/2.x/rendering-components#parameters
- Vedo l’hook mount che sarebbe il costruttore https://laravel-livewire.com/docs/2.x/lifecycle-hooks

```php
public function mount()
    {
        $this->title = $this->article->title;
        $this->subtitle = $this->article->subtitle;
        $this->body = $this->article->body;
    }
```

- Inserisco il metodo update:

```php
public $title;
    public $subtitle;
    public $body;

    public Article $article;

    public function mount()
    {
        $this->title = $this->article->title;
        $this->subtitle = $this->article->subtitle;
        $this->body = $this->article->body;
    }
    protected $rules = [
        'title' => 'required|min:3',
        'subtitle' => 'required',
        'body' =>  'required',
    ];
    public function update()
    {
        $this->validate();
        $this->article->update([
            'title' => $this->title,
            'subtitle' =>  $this->subtitle,
            'body' =>  $this->body,
        ]);

        session()->flash('articles', 'Post successfully updated.');
    }
```

## Delete

- Dentro la index inserisco un metodo destroy:

```
public function destroy(Article $article)
    {
        $article->delete();
        session()->flash('articles', 'Post successfully updated.');
    }
```

- Dentro la view:

```php
<button wire:click="destroy({{$article}})" class="btn btn-danger">Elimina</button>
```