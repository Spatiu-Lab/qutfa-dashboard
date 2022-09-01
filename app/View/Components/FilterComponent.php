<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $status;
    public $customers;
    public $clients;
    public $date;
    public $columns = [];
    public $params = [];
    public function __construct($status = null , $clients = null , $date = null, $columns = [], $params = [])
    {
        $this->status = $status;
        $this->date = $date;
        $this->clients = $clients;
        $this->columns = $columns;
        $this->params = $params;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter-component');
    }
}
