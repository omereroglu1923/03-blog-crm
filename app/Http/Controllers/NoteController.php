<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Note;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    use AuthorizesRequests;

    public function store(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:2000'],
        ]);

        // Adım 5'te (Comment) hatadan öğrenilen kalıp, burada bilinçli olarak baştan uygulanıyor:
        // 1) İlk belongsTo (customer) ilişki üzerinden make() ile bağlanıyor
        $note = $customer->notes()->make([
            'body' => $validated['body'],
        ]);

        // 2) İkinci belongsTo (user) associate() ile, mass assignment'a hiç uğramadan bağlanıyor
        $note->user()->associate($request->user());

        // 3) Şimdi veritabanına kaydet
        $note->save();

        return redirect()->route('crm.customers.show', $customer);
    }

    public function destroy(Customer $customer, Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        return redirect()->route('crm.customers.show', $customer);
    }
}