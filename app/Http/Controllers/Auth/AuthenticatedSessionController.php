<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function PHPUnit\Framework\isEmpty;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $user = DB::table('users')
        ->where('username', $request->username)
        ->first();

        if(empty($user)){
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'failed' => 'Login Anda Gagal, Periksa email dan password Anda!',
            ]);
        } else {
            $request->authenticate($request);
        }

        switch($user->role){
            case 1:
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
                break;
            case 2:
                    $request->session()->regenerate();
                    return redirect()->intended('/dashboard');
                    break;
            default:
                return redirect()->intended('/login');
        }

        // $request->session()->regenerate();
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
