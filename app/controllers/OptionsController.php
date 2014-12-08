<?php

use Illuminate\Support\MessageBag;

class OptionsController extends BaseController {

    /**
     * Display a listing of the resource.
     * GET /options
     *
     * @return Response
     */
    public function index()
    {
        $options = Option::all();

        $pageTitle = 'Options';

        return View::make( 'options.index', compact( 'options', 'pageTitle' ) );
    }

    /**
     * Show the form for creating a new resource.
     * GET /options/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /options
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /options/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /options/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $option = option::find($id);
        $pageTitle = 'Edit '. $option->name;

        return View::make( 'options.edit', compact( 'option', 'pageTitle' ) );
    }

    /**
     * Update the specified resource in storage.
     * PUT /options/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $option = Option::findOrFail($id);

        $validator = Validator::make( $data = Input::all(), Option::$rules );

        if( $validator->fails() )
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $option->update( $data );

        return Redirect::route('admin.options.index');
    }

    public function confirmDestroy( $id ) {
        $option = Option::find( $id );

        if( in_array( $option->name, Config::get( 'options.locked', [ 'site_title', 'monk_version' ] ) ) ) {
            Redirect::route( 'options.index' )->withErrors( new MessageBag( [
                'name' => 'You can only edit: ' . $option->name,
            ] ) );
        }
        $viewData = [
            'user' => $option,
            'pageTitle' => 'Confirm Delete ' . $option->name,
        ];

        return Response::view( 'options.destroy', $viewData );
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /options/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}