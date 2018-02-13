<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class MenuComposer 
{
    protected $menuItem;

    public function __construct() {
        // $this->menuItem = [
        //     [
        //         'isFirstItem'=>true,
        //         'isActive'=>true,
        //         'url'=>'/',
        //         'color'=>'blue',
        //         'icon'=>'home',
        //         'name'=>'Dashboard'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'brown',
        //         'icon'=>'email',
        //         'name'=>'Email'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'blue',
        //         'icon'=>'share',
        //         'name'=>'Compose',
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'deep-orange',
        //         'icon'=>'calendar',
        //         'name'=>'Calendar'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'deep-purple',
        //         'icon'=>'comment-alt',
        //         'name'=>'Chat'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'indigo',
        //         'icon'=>'bar-chart',
        //         'name'=>'Charts'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'light-blue',
        //         'icon'=>'pencil',
        //         'name'=>'Forms'
        //     ], 
        //     [
        //         'url'=>'/',
        //         'color'=>'pink',
        //         'icon'=>'palette',
        //         'name'=>'UI Elements'
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'brown',
        //         'icon'=>'email',
        //         'name'=>'Email',
        //         'submenu' => [
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Basic Table'
        //             ],
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Data Table'
        //             ]
        //         ]
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'purple',
        //         'icon'=>'map',
        //         'name'=>'Maps',
        //         'submenu' => [
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Google Map'
        //             ],
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Vector Map'
        //             ]
        //         ]
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'red',
        //         'icon'=>'files',
        //         'name'=>'Pages',
        //         'submenu' => [
        //             [
        //                 'url'=>'/',
        //                 'name'=>'404'
        //             ],
        //             [
        //                 'url'=>'/',
        //                 'name'=>'500'
        //             ],
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Sign In'
        //             ],
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Sign Up'
        //             ]
        //         ]
        //     ],
        //     [
        //         'url'=>'/',
        //         'color'=>'teal',
        //         'icon'=>'view-list-alt',
        //         'name'=>'Multiple Levels',
        //         'submenu' => [
        //             [
        //                 'url'=>'/',
        //                 'name'=>'Menu Item'
        //             ],
        //             [
        //                 'name'=>'Menu Item',
        //                 'submenu'=>[
        //                     [
        //                         'url'=>'/',
        //                         'name'=>'Menu Item'
        //                     ],
        //                     [
        //                         'url'=>'/',
        //                         'name'=>'Menu Item'
        //                     ]
        //                 ]
        //             ]
        //         ]
        //     ]
        // ];
        $datasourceMenuItem = Storage::disk('local')->get('data\dataMenuItem.json');
        $this->menuItem = json_decode($datasourceMenuItem,true);
    }

    public function compose(View $view) {
        $view->with('menuItem', $this->menuItem);
    }
}