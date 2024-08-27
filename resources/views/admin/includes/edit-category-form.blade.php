<form action="{{isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store')}}" method="post">
    @csrf
    @if (isset($category))
        @method('patch')
    @endif
    <x-text-field
        name="name"
        id="nameField"
        label="Nom de la catégorie"
        placeholder="Entrez le nom de la nouvelle catégorie"
        value="{{$category->name ?? ''}}"
    />
    <x-text-field
        type="textarea"
        name="description"
        id="descriptionField"
        label="Description"
        placeholder="Entrez le nom de la nouvelle catégorie"
        :value="$category->description ?? null"
    />
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Valider</button>
    </div>
    {{-- @if (isset($category))
        Mode édition
    @else
        Mode création
    @endif --}}
</form>
