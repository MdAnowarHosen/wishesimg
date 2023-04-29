<section class="mt-6">
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-12 md:col-span-8 mb-5">
            <div>
                <h1 class=" font-bold text-lg mb-5">Contact Message</h1>
                <p class="mt-5"> <span class=" font-semibold">Name: </span> <span>{{ $contact->name }}</span></p>
                <p class="mt-3"><span class=" font-semibold">Email: </span> <span>{{ $contact->email }}</span></p>
                <p class="mt-8"><span class=" font-semibold">Subject: </span> <span>{{ $contact->subject }}</span></p>
                <p class="mt-8"><span class=" font-semibold">Message: </span></p>
                <div>
                    {{ $contact->message }}
                </div>
            </div>
        </div>
        @if ($contact->user != null)
        <div class="col-span-12 md:col-span-4 mb-5">
            <h2 class=" font-bold text-lg mb-5">User Datails</h2>
            <div>
                <p class="mt-5"> <span class=" font-semibold">User Name: </span> <span>{{ $contact->user->name }}</span></p>
                <p class="mt-5"> <span class=" font-semibold">User Email: </span> <span>{{ $contact->user->email }}</span></p>
                <p class="mt-5"> <span class=" font-semibold">Username: </span> <span>{{ $contact->user->username }}</span></p>
            </div>
        </div>
        @endif

    </div>
</section>
