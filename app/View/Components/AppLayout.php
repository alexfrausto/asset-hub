<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $userTheme = Auth::user()->getSetting('theme');

        return view('layouts.app', [
            'userTheme' => $userTheme,
        ]);
    }
}
