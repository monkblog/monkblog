<?php

class AuthController extends BaseController {

    public function getLogin() {

        $email = Input::get( 'email' , null );

        $viewData = [
            'pageTitle' => 'Login',
            'email' => $email,
        ];

        return Response::view( 'login', $viewData );
    }

    public function postLogin() {

        $email = Input::get( 'email' );
        $password = Input::get( 'password' );

        if ( Auth::attempt( [ 'email' => $email, 'password' => $password ] ) ) {
            return Redirect::route( 'admin.home' );
        } else {
            return Redirect::route( 'login' )->withInput( [ 'email' => $email  ] );
        }
    }


    public function getLogout() {
        Auth::logout();

        return Redirect::route( 'home' );
    }

}
