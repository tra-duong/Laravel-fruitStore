<?php

namespace App\Livewire\Category;

use App\Constants\Constants;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class ListCategoryComponent extends Component
{
    protected $paginator;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $categories = DB::table('fruit_categories')
            ->select('fruit_categories.id', 'fruit_categories.title', DB::raw('COUNT(fruits.id) as fruit_count'))
            ->leftJoin('fruits', 'fruit_categories.id', '=', 'fruits.category_id')
            ->groupBy('fruit_categories.id', 'fruit_categories.title')
            ->get();
        $perPage = Constants::ITEMS_PER_PAGE;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $this->paginator = new LengthAwarePaginator(
            $categories->forPage($currentPage, $perPage),
            $categories->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }
    public function render()
    {
        return view('livewire.category.list-category', ['paginator' => $this->paginator]);
    }
}
