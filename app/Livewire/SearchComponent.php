<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Province;
use Illuminate\Support\Arr;
use Livewire\Component;

class SearchComponent extends Component
{
    public $rootCategories = [];
    public $typeCategories = [];
    public $portfolioTypes = [];
    public $provinces = [];
    public $counties = [];
    public $districts = [];
    public $selectedRootCategory;
    public $selectedTypeCategory;
    public $selectedPortfolioType;

    public $keyword;
    public $minPrice;
    public $maxPrice;
    public $currency;

    public $provinceId;
    public $countyId;
    public $districtId;
    public function mount()
    {
        $this->rootCategories = Category::isRoot()->has('children')->with('children')->get();
        // $this->typeCategories = $this->rootCategories->where('id', $this->selectedRootCategory)->first()?->load('children')->children;
        // $this->portfolioTypes = $this->typeCategories->where('id', $this->selectedTypeCategory)->first()?->load('children')->children;

        // $this->selectedRootCategory = $this->rootCategories->first()?->id;
        // $this->selectedTypeCategory = $this->typeCategories?->first()->id;
        // $this->selectedPortfolioType =$this->portfolioTypes->first()?->id ;

        $this->provinces = Province::with('counties.districts')->get();
        $this->counties = $this->provinces?->first()?->load('counties')?->counties;
        $this->districts = $this->counties?->first()?->load('districts')?->districts;

        $this->provinceId = null;
        $this->countyId = null;
        $this->districtId = null;
    }
    public function render()
    {
        return view('livewire.search-component');
    }

   public function updated($name, $value)
   {
       if ($name == 'selectedRootCategory') {
           $this->typeCategories = $this->rootCategories->where('id', $value)->first()?->load('children.children')->children;
           $this->portfolioTypes = $this->typeCategories->where('id', $this->typeCategories->first()->id)->first()?->load('children')->children;

           $this->selectedTypeCategory = null;
           $this->selectedPortfolioType = null;
       }

       if ($name == 'selectedTypeCategory') {
           if ($value == 0) {
               return;
           }
           $this->portfolioTypes = $this->typeCategories->where('id', $value)->first()?->load('children')->children;
       }

       if ($name == 'provinceId') {
           if ($value == '0') {
               return;
           }

           $this->counties = $this->provinces->where('id', $value)?->first()?->load('counties')?->counties;
       }

       if ($name == 'countyId') {
           if ($value == '0') {
               return;
           }
           $county = $this->counties?->where('id', $value)->first();
           $this->provinceId = $county->province_id;
           $this->districts = $county?->load('districts')?->districts;
       }
   }

   public function search()
   {
       // \Arr::whereNotNull()
       $a =   array_filter($this->only('selectedRootCategory', 'selectedTypeCategory', 'selectedPortfolioType', 'keyword', 'minPrice', 'maxPrice', 'currency', 'provinceId', 'countyId', 'districtId'));
       dd($a);
   }
}
