<form action="{{isset($author) ? route('admin.authors.update', $author) : route('admin.authors.store')}}" method="post">
    @csrf
    @if (isset($author))
        @method('patch')
    @endif
    <x-text-field
        name="name"
        id="nameField"
        label="Nom de l'auteur"
        placeholder="Entrez le nom de l'auteur"
        value="{{$author->name ?? ''}}"
        required
        withSlug
    />
    <x-text-field
        type="textarea"
        name="biographie"
        id="biographieField"
        label="Biographie"
        placeholder="Entrez la biogrpahie de l'auteur"
        :value="$author->biographie ?? null"
    />
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
    {{-- @if (isset($author))
        Mode édition
    @else
        Mode création
    @endif --}}
</form>
