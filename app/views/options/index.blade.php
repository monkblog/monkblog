@extends( 'admin.layout' )

@section( 'content' )
    <table>
        <thead>
            <tr><th>Name</th><th>Value</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $options as $option )
        <tr>
            <td><a href="{{ URL::route( 'admin.options.edit', $option->id ) }}">{{{ $option->name }}}</a></td>
            <td>{{{ $option->value }}}</td>
            <td><a href="{{ URL::route( 'admin.options.confirmdestroy', $option->id ) }}" title="Delete {{{ $option->name }}}" class="button alert">Delete</a></td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.options.create' ) }}" class="button">Create New Option</a>
@stop
