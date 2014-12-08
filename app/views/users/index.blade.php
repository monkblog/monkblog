@extends( 'admin.layout' )

@section( 'content' )
    @if( $error = $errors->first( 'change_password' ) )
    <small class="error">{{ $error }}</small>
    @endif
    @if( Input::old( 'message' ) )
    <div data-alert class="alert-box success radius">
      {{ Input::old( 'message' ) }}
      <a href="#" class="close">&times;</a>
    </div>
    @endif
    <table>
        <thead>
            <tr><th>Email</th><th>Name</th><th>Display Name</th><th></th></tr>
        </thead>
        <tbody>
    @foreach( $users as $user )
        <tr>
            <td>
                <h5><a href="{{ URL::route( 'admin.users.edit', $user->id ) }}" title="Edit {{ $user->display_name }}">{{{ $user->email }}}</a></h5>
                <a href="{{ URL::route( 'admin.users.updatePassword', $user->id ) }}" title="Change Password">Change Password</a>
            </td>
            <td>{{{ $user->first_name }}} {{{ $user->last_name }}}</td>
            <td>{{{ $user->display_name }}}</td>
            <td>
                <a href="{{ URL::route( 'admin.users.edit', $user->id ) }}" title="Edit {{{ $user->display_name }}}" class="button">Edit</a>
                <a href="{{ URL::route( 'admin.users.confirmdestroy', $user->id ) }}" title="Delete {{{ $user->display_name }}}" class="button alert">Delete</a>
            </td>
            </tr>
    @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route( 'admin.users.create' ) }}" class="button">Create New User</a>
@stop
