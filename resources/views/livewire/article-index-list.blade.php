<div>
    <table class="table border mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Sottotitolo</th>
                <th scope="col">Corpo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->body }}</td>
                <td>
                    <a href="#" class="btn btn-warning">Modifica</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
