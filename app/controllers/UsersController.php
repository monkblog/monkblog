<?php

class UsersController extends \BaseController {

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index() {
        $users = User::all();
        $pageTitle = 'Users';

        return View::make( 'users.index', compact( 'users', 'pageTitle' ) );
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create() {
        $user = new User();
        $pageTitle = 'Create User';
        return View::make( 'users.create', compact( 'user' , 'pageTitle') );
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);

        if( $validator->fails() )
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data[ 'password' ] = Hash::make( $data[ 'password' ] );

        User::create( $data );

        return Redirect::route('admin.users.index');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail( $id );
        $pageTitle = $user->display_name;

        return View::make( 'users.show', compact( 'user', 'pageTitle' ) );
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $pageTitle = 'Edit '. $user->display_name;

        return View::make( 'users.edit', compact( 'user', 'pageTitle' ) );
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::findOrFail( $id );
        $data = Input::all();

        $userRules = User::$rules;
        //allow a user to update his info
        $userRules[ 'email' ] = str_replace( '{id}', $user->id, $userRules[ 'email' ] );
        $userRules[ 'display_name' ] = str_replace( '{id}', $user->id, $userRules[ 'display_name' ] );
        $data[ 'password_confirmation' ] = $data[ 'password' ];

        $validator = Validator::make( $data, $userRules );

        if( $validator->fails() ) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user->update( $data );

        return Redirect::route('admin.users.index');
    }

    public function confirmDestroy( $id ) {
        $user = User::find( $id );

        $viewData = [
            'user' => $user,
            'pageTitle' => 'Confirm Delete ' . $user->display_name,
        ];

        return Response::view( 'users.destroy', $viewData );
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy( $id ) {
        User::destroy( $id );

        return Redirect::route( 'admin.users.index' );
    }

}
