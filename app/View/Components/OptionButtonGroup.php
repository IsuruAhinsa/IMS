<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OptionButtonGroup extends Component
{
    public $btnText1;
    public $btnText2;
    public $btnText3;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($btnText1, $btnText2, $btnText3)
    {
        $this->btnText1 = $btnText1;
        $this->btnText2 = $btnText2;
        $this->btnText3 = $btnText3;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.option-button-group');
    }
}
