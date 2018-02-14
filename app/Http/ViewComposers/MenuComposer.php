<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class MenuComposer 
{
    protected $menuItem;

    public function __construct() {
        $datasourceMenuItem = Storage::disk('local')->get('data\dataMenuItem.json');
        $this->menuItem = json_decode($datasourceMenuItem,true);
    }

    public function compose(View $view) {
        $view->with('menuItem', $this->menuItem);
    }
}