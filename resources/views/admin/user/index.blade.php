<!DOCTYPE html>
<html lang="en">
@include('admin.include.head')
<body>
    <div id="wrapper">
        @include('admin.include.navbar')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Users</h1>
                </div>
                <div class="col-md-12">
                        <div class="well">
                            <table class="table">
                                <tr>
                                    <td><label>ID</label></td>
                                    <td><label>Name</label></td>
                                    <td><label>Email</label></td>
                                    <td><label>delete</label></td>
                                </tr>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('user.delete',['id' => $user->id]) }}" class="btn btn-primary">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.include.js')
</body>

</html>
