<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (auth()->user()->role == 1) {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            } else if (auth()->user()->role == 2) {
                return redirect()->intended(RouteServiceProvider::DINAS);
            } else if (auth()->user()->role == 3) {
                return redirect()->intended(RouteServiceProvider::JURI);
            } else if (auth()->user()->role == 4) {
                return redirect()->intended(RouteServiceProvider::KETUA);
            } else if (auth()->user()->role == 5) {
                return redirect()->intended(RouteServiceProvider::ANGGOTA);
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
