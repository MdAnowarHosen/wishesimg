<?php

namespace App\Http\Controllers\Admin\Contact;


use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Tables\Admin\Contact\ContactTable;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function index()
    {
        SEO::title('Contact Inbox');
        return view('admin.contact.show',[
            'contacts' => ContactTable::class,
        ]);
    }

    public function view(Contact $contact)
    {
        SEO::title($contact->subject);
       return view('admin.contact.view',[
        'contact' => $contact
       ]);
    }
}
