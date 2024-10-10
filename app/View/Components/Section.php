<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    public $bgColor;
    public $textColor;
    public $pad;
    /**
     * Create a new component instance.
     */
    public function __construct($bgColor, $textColor, $pad = '')
    {
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
        $this->pad = $pad;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.section');
    }
}
