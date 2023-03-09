@php
use App\Models\User;
User::where('id', Auth::user()->id)
->update(['last_login' => now()]);
@endphp