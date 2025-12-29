<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class link extends Component
{
    public $route;

    public $active;

    /**
     * Create a new component instance.
     */
    public function __construct($route = '')
    {
        $this->route = $route;
        // TODO: Доработать условия для вложенных адресов, не только для прямых
        $this->active = ! empty($this->route) && str_starts_with(Route::currentRouteName(), $this->route) ? ' active' : '';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.link');
    }
}
