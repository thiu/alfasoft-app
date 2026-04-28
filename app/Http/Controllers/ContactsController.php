<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;

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
}
