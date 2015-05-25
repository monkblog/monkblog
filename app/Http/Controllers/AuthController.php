<?php

use Illuminate\Support\MessageBag;

class AuthController extends BaseController {

    public function getLogin() {
        $errors = ( Input::old( 'errors' ) ) ? Input::old( 'errors' ) : new MessageBag();

        $viewData = [
            'pageTitle' => 'Login',
            'errors' => $errors,
            'redirect' => Input::get( 'redirect_to' ),
        ];
        return Response::view( 'login', $viewData );
    }

    public function postLogin() {
        $email = Input::get( 'email' );

        $validator = Validator::make( Input::all(), [
            "email" => "required|email",
            "password" => "required"
        ]);

        if( $validator->passes() ) {
            $credentials = [
                'email' => $email,
                'password' => Input::get( 'password' )
            ];
            if( Auth::attempt( $credentials ) ) {
                if( $redirect_admin = Input::get( 'redirect_to' ) ) {
                    return Redirect::to( $redirect_admin );
                }
                return Redirect::route( 'admin.home' );
            }
            $data[ 'errors' ] = new MessageBag([
               'password' => 'Email and/or Password are invalid',
            ]);
        }
        else {
            $data[ 'errors' ] = $validator->getMessageBag();
        }
        $data[ 'email' ] = $email;

        return Redirect::route( 'login' )->withInput( $data );
    }


    public function getLogout() {
        Auth::logout();

        return Redirect::route( 'home' );
    }

}
