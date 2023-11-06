<!DOCTYPE html>
<html lang="en">

@include('admin.include.head')
<style>
    .custom-modal{
        max-width: 400px;
        width: 100%
    }
</style>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.include.navbar')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 page-header">
                        <span class="title pull-left">FeedBack Details</span>
                        <a href="{{ route('feedback') }}" class="btn btn-sm btn-success pull-right"><i class="fa fa-minus"></i>
                            Back
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            @if(session()->has('danger'))
            <div class="alert alert-danger">
                {{ session()->get('danger') }}
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                                <div class="modeal " id="detail-modal-" tabindex="-1" role="" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="" role="document">
                                        <div class="">
                                            <div class="modal-body">
                                                <label for="inputTitle">User Name:</label><input  class="form-control" type="text" id="inputTitle" readonly value=" {{ $feedback->users->name }}" />

                                                <label for="inputdescription">Description:</label><input  class="form-control" type="text" readonly id="inputdescription" value="{{ $feedback->description }}" />

                                                <label for="inputcategory">Category:</label><input  class="form-control" type="text" readonly id="inputcategory" value="{{ $feedback->category }}" />
                                                @isset($comments)
                                                <div class="comments-container">
                                                @foreach ($comments as $comment)
                                                        <div class="comment mt-4">
                                                            <p class="user-name"><strong>{{ $comment->content }}</strong></p>
                                                            <p class="comment-date">{{ $comment->created_at }}</p>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                @endisset
                                                <button class="btn btn-primary" style="margin-top: 10px"  data-toggle="modal" data-target="#comment-modal">Add Comment</button>
                                            </div>
                                             <!-- Comment Modal -->
                                             <div class="modal fade comment-modal d-flex justify-content-center align-items-center" id="comment-modal" tabindex="-1" role="dialog" aria-labelledby="commentModalLabel" aria-hidden="true">
                                                <div class="modal-dialog custom-modal" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-center mt-10" id="commentModalLabel">Add Comment</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="{{ route('user.feedback.comment', ['id' => $feedback->id]) }}" id="comment-form">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="comment">Comment</label>
                                                                    <textarea name="comment" class="form-control" placeholder="Enter your comment"></textarea>
                                                                    <div id="error-message" class="text-danger"></div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" id="submit-comment">Save</button>

                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('admin.include.js')
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    $(document).ready(function () {
        $("#submit-comment").click(function () {
            var comment = $("textarea[name='comment']").val();
            var errorMessageElement = $("#error-message");

            if (comment.trim() === '') {
                errorMessageElement.text('Comment field cannot be empty');
            } else {
                errorMessageElement.text('');
                $('#comment-modal').modal('hide');
                $("#comment-form").submit();
            }
        });
    });

    </script>

</body>
</html>
