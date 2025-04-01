<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobFormRequest;
use App\Http\Requests\StorePortfolioFormRequest;
use App\Models\Form;

class FormController extends Controller
{
    public function storePortfolioForm(StorePortfolioFormRequest $request)
    {
        Form::create($request->validated());

        return back()->with('success', 'success');
    }

    public function storeJobForm(StoreJobFormRequest $request)
    {
        $attachment = $request->file('attachment')->store('jobs/cv', ['disk' => 'public']);
        Form::create($request->safe()->merge(compact('attachment'))->toArray());

        return back()->with('success', 'success');
    }
}
