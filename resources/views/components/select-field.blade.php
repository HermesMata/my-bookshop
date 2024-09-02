<div class="form-group mb-3">
    @if ($label)
        <label for="{{$id}}" class="form-label">
            {{ $label }}
            @if ($indicators && $required)
                <span class="text-danger">*</span>
            @elseif ($indicators && !$required)
            <span class="text-secondary">(optionnel)</span>
            @endif
        </label>
    @endif
    <select
        @class(["form-select", "is-invalid" => $errors->has($name) || ($withSlug && $errors->has('slug'))])
        id="{{$id}}"
        name="{{$name}}"
        placeholder="{{ $placeholder }}"
        :required="$required"
        >
        @foreach ($options as $value => $visible_text)
            <option value="{{ $value }}" selected="{{ $value === old($name, $selected)}}">{{ $visible_text }}</option>
        @endforeach
    </select>
    @if ($errors->has($name))
        <div @class(["invalid-feedback"])>{{ $errors->first($name) }}</div>
    @elseif ($withSlug && $errors->has('slug'))
        <div @class(["invalid-feedback"])>{{ $errors->first('slug') }}</div>
    @elseif ($helpText)
        <div @class(["form-text"])>{{ $helpText }}</div>
    @endif
</div>
