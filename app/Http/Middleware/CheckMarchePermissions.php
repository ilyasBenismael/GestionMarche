<?php

namespace App\Http\Middleware;

use App\Models\marche;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckMarchePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('id');
        $user = Auth::user();
        $marche = Marche::find($id);

        if ($user && $marche) {
            if ($user->role=='admin' || ($user->role=='cadre' && $user->id == $marche->responsable_de_suivi)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized');
    }

}
