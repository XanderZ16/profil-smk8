<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShareWidget extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $currentUrl = url()->current();

        $share_to_whatsapp = 'https://api.whatsapp.com/send?text=' . urlencode($currentUrl);
        $share_to_facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($currentUrl);
        $share_to_instagram = 'https://www.instagram.com/sharer/sharer.php?u=' . urlencode($currentUrl);

        return view('components.share-widget', compact('share_to_whatsapp', 'share_to_facebook', 'share_to_instagram'));
    }
}
