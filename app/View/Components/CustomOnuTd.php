<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CustomOnuTd extends Component
{
    /**
     * Create a new component instance.
     */
    public $txt, $bg;
    public function __construct($txt)
    {
        $this->txt = $txt; 
        
        if ($txt == 'En cours') {
            $this->bg = 'bg-warning ';
        } elseif ($txt == 'Non') {
            $this->bg = 'bg-secondary text-white ';
        } elseif ($txt == 'Sur site') {
            $this->bg = 'bg-success ';
        } else {
            $this->bg = 'bg-success ';
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.custom-onu-td');
    }
}
