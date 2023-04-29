<?php

namespace App\Http\Controllers\Frontend\Contact;

use Illuminate\Http\Request;
use App\Models\Contact\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\Frontend\Contact\ContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function contact()
    {
        SEO::title('Contact us');
        return view('frontend.contact.contact');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        if (Auth::check())
        {
            $contact->user_id = Auth::id();
        }

        $store = $contact->save();
        if ($store)
        {
            Toast::title('Success!')
            ->message('We have received your message. Thanks for contact us.')
            ->success()
            ->autoDismiss(5);
        }
        else
        {
            Toast::title('Failed!')
            ->message('Failed to send message!')
            ->danger()
            ->autoDismiss(5);
        }

        return redirect()->back();

    }

}
