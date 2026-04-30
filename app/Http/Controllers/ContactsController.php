<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class ContactsController extends Controller
{
    public function index()
    {
        return Inertia::render('ContactsPage', [
            'canLogin' => Route::has('login'),
            'contacts' => Contact::select(
                            'id',
                            'name',
                            'email',
                            'contact'
                        )->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('CreateContactPage', [
            'canLogin' => Route::has('login')
        ]);
    }

    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return to_route('home', [], 303);
    }

    public function edit(int $id)
    {
        return Inertia::render('EditContactPage', [
            'canLogin' => Route::has('login'),
            'contact' => Contact::select(
                            'id',
                            'name',
                            'email',
                            'contact'
                        )->find($id)
        ]);
    }

    public function update(ContactRequest $request, int $id)
    {
        $data = Contact::findOrFail($id);
        $data->update($request->validated());

        return to_route('home', [], 303);
    }

    public function destroy(int $id)
    {
        Contact::destroy($id);
        return to_route('home');
    }
}
