@extends( 'admin.layout' )

@section( 'content' )
    {{ Form::model( $option, [ 'route' => [ 'admin.options.update' , $option->id ], 'method' => 'put' ] ) }}
        {{ Form::label( 'name', 'Option Name' ) }}
        {{ Form::text( 'name' ) }}
        {{ Form::label( 'value', 'Option Value' ) }}
        {{ Form::text( 'value' ) }}
        {{ Form::hidden( 'autoload', true ) }}
        {{ Form::submit( 'Save', [ 'class' => 'button' ] ) }}
    {{ Form::close() }}
@stop