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
    @if ($type == "textarea")
        <textarea
            @class(["form-control", "is-invalid" => $errors->has($name) || ($withSlug && $errors->has('slug'))])
            id="{{$id}}"
            name="{{$name}}"
            @if($big) cols="30" rows="10" @endif
            style="resize: none;"
            placeholder="{{ $placeholder }}"
            :required="$required"
            >{{old($name, $value)}}</textarea>
    @else
        <input
            type="{{$type}}"
            @class(["form-control", "is-invalid" => $errors->has($name) || ($withSlug && $errors->has('slug'))])
            id="{{$id}}"
            name="{{$name}}"
            placeholder="{{ $placeholder }}"
            value="{{old($name, $value)}}"
            :required="$required"
        >
    @endif
    @if ($errors->has($name))
        <div @class(["invalid-feedback"])>{{ $errors->first($name) }}</div>
    @elseif ($withSlug && $errors->has('slug'))
        <div @class(["invalid-feedback"])>{{ $errors->first('slug') }}</div>
    @elseif ($helpText)
        <div @class(["form-text"])>{{ $helpText }}</div>
    @endif
    @if (!$big)
        <script>
            if (autosize) {
                autosize(document.getElementById("{{$id}}"))
            }
        </script>
    @endif
</div>
