<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Department;
use App\Models\Info;
use App\Models\Province;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PagesController extends Controller
{
    public function home()
    {

        $portfolios = RealEstate::with('infos', 'media', 'category.rootAncestor', 'district.county.province')->latest()->limit(6)->get();
        $rootCategories = Category::isRoot()->with('children.children')->get();
        $provinces = Province::all();
        $videos = [];
        $videoCategories = [];
        $searchableCategories = $rootCategories->take(5);

        return view('themes.main.pages.home', compact('portfolios', 'rootCategories', 'provinces', 'videos', 'videoCategories', 'searchableCategories'));
    }

    public function portfolios()
    {

        $portfolios = QueryBuilder::for(RealEstate::class)->with(
            'infos',
            // 'options.option',
            'media',
            'category.rootAncestor',
            'district.county.province'
        )->allowedFilters([
            AllowedFilter::scope('province'),
            AllowedFilter::scope('town'),
            AllowedFilter::scope('category'),
            AllowedFilter::scope('min_price'),
            AllowedFilter::scope('max_price'),
            AllowedFilter::scope('info'),
            AllowedFilter::scope('user_id'),
            AllowedFilter::scope('search'),
        ])->allowedSorts([
            'price_in_tl',
            'created_at',
        ])->defaultSort('-created_at')->paginate();

        $rootCategories = Category::isRoot()->with('children.children')->get();
        $provinces = Province::all();
        $selectedCategory = Category::find(request('filter.category'))?->load('rootAncestor');
        $selectedCategoryFilters = Category::find(request('filter.category'));

        $filters = collect();
        if ($selectedCategoryFilters) {
            // TODO
            // $filters = Info::has('options')->with('options')->where('filterable', true)
            // ->whereIn('category_id', $selectedCategoryFilters->bloodline()->pluck('id')->toArray())->get();
        }
        $locations = RealEstate::limit(200)->with('media')->get()->map(fn ($por) => [
            'lat' => (float) $por->lat_lon[0],
            'lng' => (float) $por->lat_lon[1],
            'title' => $por->title,
            'id' => $por->id,
            'img' => $por->media->first()?->original_url,
            'url' => route('frontend.portfolio.show', $por),
        ]);

        return view(
            'themes.main.pages.portfolio',
            compact(
                'portfolios',
                'rootCategories',
                'provinces',
                'filters',
                'locations',
                'selectedCategory'
            )
        );
    }

    public function showPortfolio(RealEstate $portfolio)
    {

        $randomPortfolios = RealEstate::inRandomOrder()->with('media', 'category.rootAncestor', 'district.county.province')->limit(3)->where('id', '<>', $portfolio->id)->get();

        return view('themes.main.pages.show_portfolio', compact('portfolio', 'randomPortfolios'));

    }

    public function team()
    {

        $departments = Department::has('users')->with('users.media')->get();


        return view('themes.main.pages.team', compact('departments'));
    }

    public function showTeam(Request $request, User $user)
    {

        $cateogries = Category::isRoot()->with('children')->get();
        $portfolios = QueryBuilder::for(RealEstate::class)->with(
            'infos',
            'images',
            'category.rootAncestor',
            'district.town.province'
        )->allowedFilters([
            AllowedFilter::scope('category'),
            AllowedFilter::scope('parent_category', 'category'),

        ])->where('user_id', $user->id)->paginate();

        return view('themes.main.pages.team-detail', compact('user', 'cateogries', 'portfolios'));
    }

    public function blog()
    {
        // todo:post model
        $posts = [];

        return view('themes.main.pages.blog', compact('posts'));
    }

    public function contact()
    {
        return view('themes.main.pages.contact');
    }
}
