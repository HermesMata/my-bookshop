<form action="{{isset($category) ? route('admin.categories.update') : route('admin.categories.store')}}" method="post">
    @csrf
    <x-text-field
        name="name"
        id="nameField"
        label="Nom de la catégorie"
        placeholder="Entrez le nom de la nouvelle catégorie"
    />
    <x-text-field
        type="textarea"
        name="description"
        id="descriptionField"
        label="Description"
        placeholder="Entrez le nom de la nouvelle catégorie"
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
