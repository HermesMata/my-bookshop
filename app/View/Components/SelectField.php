<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public \Illuminate\Support\Collection|array $options,
        public ?string $id = null,
        public string $placeholder = "",
        public string $helpText = "",
        public ?string $label = null,
        public ?string $selected = null,
        public bool $indicators = true,
        public bool $required = false,
        public bool $withSlug = false,
    ) {
        if (!$id) {
            $id = $name . "Field";
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-field');
    }
}
