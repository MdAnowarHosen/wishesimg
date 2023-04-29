<?php

namespace App\Tables\Admin\Contact;

use App\Models\Contact\Contact;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class ContactTable extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return auth()->check() && auth()->user()->is_admin == true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Contact::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['name','email','subject'])
            ->column('id', sortable:true,searchable:true,)
            ->column('name', sortable:true,searchable:true)
            ->column('email', sortable:true,searchable:true)
            ->column('subject', sortable:true,searchable:true)
            ->rowLink(fn (Contact $contact) => route('admin.contact.view', $contact->id))
            ->defaultSort('-id')
           ->column(
                key: 'user.name',
                label: 'User',
                sortable: true,
                searchable:true
           )
           ->export()
           ->paginate(50);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
