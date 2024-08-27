<div class="form-group mb-3">
    @if ($label)
        <label for="{{$id}}" class="form-label">
            {{ $label }}
        </label>
    @endif
    @if ($type == "textarea")
        <textarea
            @class(["form-control", "is-invalid" => $errors->has($name)])
            id="{{$id}}"
            name="{{$name}}"
            @if($big) cols="30" rows="10" @endif
            style="resize: none;"
            placeholder="{{ $placeholder }}"
        ></textarea>
    @else
        <input
            type="{{$type}}"
            @class(["form-control", "is-invalid" => $errors->has($name)])
            id="{{$id}}"
            name="{{$name}}"
            placeholder="{{ $placeholder }}"
        >
    @endif
    @if ($errors->has($name))
        <div @class(["invalid-feedback"])>{{ $errors->first($name) }}</div>
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
