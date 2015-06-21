<?php

namespace MonkBlog\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Response;
use MonkBlog\Models\OptionTab;
use MonkBlog\Models\Option;
use Validator;
use Cache;
use Input;

class OptionsController extends BaseController
{

    /**
     * Display a listing of the resource.
     * GET /options
     *
     * @return Response
     */
    public function index()
    {

        $optionTabs = OptionTab::all();

        $firstTab = $optionTabs->first();

        $slug = $firstTab->slug;

        $pageTitle = $firstTab->display_name . ' Options';

        $options = $firstTab->options->all();

        return view( 'options.index', compact( 'slug', 'optionTabs', 'options', 'pageTitle' ) );
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
     * @param  $slug
     *
     * @return Response
     */
    public function show( $slug )
    {
        $optionTabs = OptionTab::all();

        $optionTab = OptionTab::where( 'slug', '=', $slug )->get()->first();

        $slug = $optionTab->slug;

        $pageTitle = $optionTab->display_name . ' Options';

        $options = $optionTab->options->all();

        return view( 'options.index', compact( 'slug', 'optionTabs', 'options', 'pageTitle' ) );
    }

    /**
     * Show the form for editing the specified resource.
     * GET /options/{id}/edit
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit( $id )
    {
        $option = Option::find( $id );
        $pageTitle = 'Edit ' . $option->display_name;

        return view( 'options.edit', compact( 'option', 'optionName', 'pageTitle' ) );
    }

    /**
     * Update the specified resource in storage.
     * PUT /options/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update( $id )
    {
        $option = Option::findOrFail( $id );

        $rules = Option::$rules;

        $rules[ 'name' ] = str_replace( '{id}', $option->id, $rules[ 'name' ] );

        $validator = Validator::make( $data = Input::all(), $rules );

        if( $validator->fails() ) {
            return redirect()->back()->withErrors( $validator )->withInput();
        }

        $option->update( $data );

        Cache::tags( 'option', $option->name )->flush();

        $tab = OptionTab::find( $option->option_tab_id );

        if( !empty( $tab ) ) {
            return redirect()->route( 'admin.options.show', $tab->slug );
        }

        return redirect()->route( 'admin.options.index' );
    }

    public function confirmDestroy( $id )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /options/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy( $id )
    {
        //
    }

}