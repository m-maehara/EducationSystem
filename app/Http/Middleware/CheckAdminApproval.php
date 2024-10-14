<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminApproval
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
        // 承認のチェックをここで行う
        if (!$this->isApproved($request)) {

            // 承認されていない場合の処理（例: エラーメッセージの表示やリダイレクト）
            return response()->json(['error' => 'Access denied.'], 403);
        }
        
        return $next($request);
    }

    // 承認チェックのためのメソッド（例）
    protected function isApproved(Request $request)
    {
        return Auth::check();
    }
}
