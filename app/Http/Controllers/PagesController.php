<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('themes.main.pages.home');
    }

    public function team()
    {
        $team = User::with('media')->whereDoesntHave('roles', function ($query) {
            $query->where('name', '=', 'Super Admin');
        })->paginate();

        return view('themes.main.pages.team', compact('team'));
    }

    public function showTeam(Request $request, User $user)
    {
        return view('themes.main.pages.team-detail', compact('user'));
    }
    public function portfolios()
    {
        $portfolios = RealEstate::paginate();
        return view('themes.main.pages.portfolio', compact('portfolios'));
    }
    public function blog()
    {
        //todo:post model
        $posts = [];
        return view('themes.main.pages.blog', compact('posts'));
    }

    public function contact()
    {
        return view('themes.main.pages.contact');
    }
}
