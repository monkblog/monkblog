@extends( 'admin.layout' )

@section( 'content' )
    <table>
        <thead>
            <tr><th>Email</th><th>Name</th><th>Display Name</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $users as $user )
        <tr>
            <td><a href="{{ URL::route( 'admin.users.edit', $user->id ) }}">{{{ $user->email }}}</a></td>
            <td>{{{ $user->first_name }}} {{{ $user->last_name }}}</td>
            <td>{{{ $user->display_name }}}</td>
            <td><a href="{{ URL::route( 'admin.users.confirmdestroy', $user->id ) }}" title="Delete {{{ $user->display_name }}}" class="button alert">Delete</a></td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.users.create' ) }}" class="button">Create New User</a>
@stop
