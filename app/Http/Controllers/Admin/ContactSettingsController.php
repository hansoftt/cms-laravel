<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Settings\ContactSettings;
use Illuminate\Http\Request;

class ContactSettingsController extends Controller
{
    public function index(ContactSettings $settings)
    {
        return view('admin.settings.contact.index', [
            'settings' => $settings
        ]);
    }

    public function update(Request $request, ContactSettings $settings)
    {
        $validated = $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ]);

        $settings->address = $validated['address'];
        $settings->phone = $validated['phone'];
        $settings->email = $validated['email'];
        $settings->save();

        return redirect()->route('admin.settings.contact.index')
            ->with('success', 'Contact settings updated successfully.');
    }
}
