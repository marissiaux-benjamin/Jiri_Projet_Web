<?php

namespace App\Listeners;

use App\Concerns\HasImageVariants;
use App\Events\ContactImageStored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateContactPhotoVariants
{
    use HasImageVariants;
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactImageStored $event): void
    {
        $this->makeImgVariants($event->validated);
    }
}
