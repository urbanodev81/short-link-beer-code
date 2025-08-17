<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ShortLinkController extends Controller
{
    // Example: Show a list of short links for the authenticated user
    public function index(Request $request)
    {
        // Placeholder: Replace with actual short link model and logic
        // $shortLinks = ShortLink::where('user_id', Auth::id())->get();
        $shortLinks = [];
        return response()->json($shortLinks);
    }

    // Example: Create a new short link
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);
        // Placeholder: Replace with actual short link creation logic
        // $shortLink = ShortLink::create([
        //     'user_id' => Auth::id(),
        //     'url' => $request->url,
        //     'code' => Str::random(6),
        // ]);
        $shortLink = [
            'url' => $request->url,
            'code' => 'abc123',
        ];
        return response()->json($shortLink, 201);
    }

    // Example: Redirect to the original URL
    public function show($code)
    {
        // Placeholder: Replace with actual lookup logic
        // $shortLink = ShortLink::where('code', $code)->firstOrFail();
        // return redirect($shortLink->url);
        return response()->json(['message' => 'Redirect logic not implemented.'], 501);
    }
}
