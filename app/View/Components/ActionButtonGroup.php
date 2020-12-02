<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ActionButtonGroup extends Component
{
    public $viewRoute;
    public $editRoute;
    public $deleteRoute;
    public $forceDeleteRoute;
    public $restoreRoute;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($viewRoute, $editRoute, $deleteRoute, $forceDeleteRoute, $restoreRoute)
    {
        $this->viewRoute = $viewRoute;
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
        $this->forceDeleteRoute = $forceDeleteRoute;
        $this->restoreRoute = $restoreRoute;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.action-button-group');
    }
}
