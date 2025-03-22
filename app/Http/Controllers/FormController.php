<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePortfolioFormRequest;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function storePortfolioForm(StorePortfolioFormRequest $request)
    {
        Form::create($request->validated());

        return back()->with('success', 'success');
    }
}
