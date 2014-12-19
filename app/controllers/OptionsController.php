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
        $option = Option::findOrFail( $id );
        $pageTitle = $option->name;

        return View::make( 'users.show', compact( 'option', 'pageTitle' ) );
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
        $optionName = ucwords( str_replace( '_', ' ', $option->name ) );
        $pageTitle = 'Edit '. $optionName;

        return View::make( 'options.edit', compact( 'option', 'optionName', 'pageTitle' ) );
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

        $rules = Option::$rules;

        $rules[ 'name' ] = str_replace( '{id}', $option->id, $rules[ 'name' ] );

        $validator = Validator::make( $data = Input::all(), $rules );

        if( $validator->fails() ) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $option->update( $data );

        return Redirect::route('admin.options.index');
    }

    public function confirmDestroy( $id ) {
        //
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