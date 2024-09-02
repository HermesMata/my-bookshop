<form action="{{isset($book) ? route('admin.books.update', $book) : route('admin.books.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if (isset($book))
        @method('patch')
    @endif
    {{-- Le titre du livre --}}
    <x-text-field
        name="title"
        id="titleField"
        label="Titre du livre"
        placeholder="Entrez le titre du livre"
        value="{{$book->title ?? ''}}"
        required
        withSlug
    />
    {{-- Le résumé du livre --}}
    <x-text-field
        type="textarea"
        name="summary"
        id="summaryField"
        label="Résumé"
        placeholder="Entrez le résumé du livre"
        :value="$book->summary ?? null"
    />
    {{-- La couverture du livre --}}
    <x-text-field
        name="poster"
        id="posterField"
        type="file"
        label="L'image de la couverture du livre"
        :value="null"
    />
    {{-- L'auteur du livre --}}
    <x-select-field
        name="author"
        label="Auteur du livre"
        :options="$authors"
        :selected="isset($book) ? $book->book_author_id : null"
        required
    />
    {{-- Catégories du livre --}}
    <x-select-field
        name="category"
        label="La catégorie à laquelle le livre sera ajouté"
        :options="$categories"
        :selected="isset($book) ? $book->book_category_id : null"
        required
    />
    {{-- La fichier du livre --}}
    <x-text-field
        name="file"
        id="fileField"
        type="file"
        label="Le fichier du livre (.pdf/.epub)"
        :value="null"
        :required="!isset($book)"
    />
    {{-- Actions du formulaire --}}
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
    {{-- @if (isset($book))
        Mode édition
    @else
        Mode création
    @endif --}}
</form>
