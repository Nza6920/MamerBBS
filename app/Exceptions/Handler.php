<?php

namespace App\Exceptions;

use App\Models\User;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        // 判断无效邮箱
        if ($exception instanceof \Swift_TransportException) {
            $user = User::where('name', $request->name)->first();
//            session()->put('badEmail', $user->email);
            session()->flash('badEmail', $user->email);
            $user->delete();

            return redirect()->route('register');
        }

        return parent::render($request, $exception);
    }
}
