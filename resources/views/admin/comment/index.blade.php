<!DOCTYPE html>
<html lang="en">
@include('admin.include.head')
<body>
    <div id="wrapper">
        @include('admin.include.navbar')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Comments</h1>
                </div>
                <div class="col-md-12">
                        <div class="well">
                            <table class="table">
                                <tr>
                                    <td><label>ID</label></td>
                                    <td><label>Content</label></td>
                                    <td><label>Author Name</label></td>
                                    <td><label>FeedBackName</label></td>
                                    <td><label>status</label></td>
                                    <td><label>Action</label></td>
                                </tr>
                                @foreach ($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $comment->content }}</td>
                                        <td>{{ $comment->user_name }}</td>
                                        <td>{{ $comment->feedback->title }}</td>
                                        <td>{{ $comment->status }}</td>
                                        <td>
                                            <a href="{{ route('comment.update',['id' => $comment->id]) }}" class="btn btn-primary">update</a>
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
