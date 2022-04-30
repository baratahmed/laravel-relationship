<?php

namespace App\Observers;

use App\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{
    public function created(Category $category)
    {
        $this->clearCache();

    }

    public function updated(Category $category)
    {
        $this->clearCache();

    }

    public function deleted(Category $category)
    {
        $this->clearCache();

    }

    public function restored(Category $category)
    {

    }

    public function forceDeleted(Category $category)
    {

    }

    protected function clearCache(){
        Cache::forget('categories');
    }
}
