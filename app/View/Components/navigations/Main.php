<?php

namespace App\View\Components\navigations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{



    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = '',
        public array $links = []
    )
    {
        $this->title = "Main navigation";
        $this->links = [
            ['name' => 'Jiri', 'url' => '/jiris'],
            ['name' => 'Projects', 'url' => '/projects'],
            ['name' => 'Contacts', 'url' => '/contacts'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.main');
    }
}
