<?php

namespace MonkBlog\Http\Controllers;

use Illuminate\Support\MessageBag;
use Input;
use Validator;
use Auth;
use Illuminate\Contracts\Auth\Guard;

class AuthController extends BaseController
{

    public function getLogin( Guard $auth )
    {
        if( $auth->check() ) {
            return redirect()->route( 'admin.home' );
        }
        $errors = ( Input::old( 'errors' ) ) ? Input::old( 'errors' ) : new MessageBag();

        $viewData = [
            'pageTitle' => 'Login',
            'errors' => $errors,
            'redirect' => Input::get( 'redirect_to' ),
        ];

        return view( 'login', $viewData );
    }

    public function postLogin()
    {
        $email = Input::get( 'email' );

        $validator = Validator::make( Input::all(), [
            "email" => "required|email",
            "password" => "required"
        ] );

        if( $validator->passes() ) {
            $credentials = [
                'email' => $email,
                'password' => Input::get( 'password' )
            ];
            if( Auth::attempt( $credentials ) ) {
                if( $redirect_admin = Input::get( 'redirect_to' ) ) {
                    return redirect()->to( $redirect_admin );
                }

                return redirect()->route( 'admin.home' );
            }
            $data[ 'errors' ] = new MessageBag( [
                'password' => 'Email and/or Password are invalid',
            ] );
        }
        else {
            $data[ 'errors' ] = $validator->getMessageBag();
        }
        $data[ 'email' ] = $email;

        return redirect()->route( 'login' )->withInput( $data );
    }


    public function getLogout()
    {
        Auth::logout();

        return redirect()->route( 'home' );
    }

}
