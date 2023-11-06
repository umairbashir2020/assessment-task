<!DOCTYPE html>
<html lang="en">
@include('admin.include.head')
<body>
    <div id="wrapper">
        <!-- Navigation -->
        @include('admin.include.navbar')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 page-header">
                        <span class="title pull-left">User FeedBack</span>
                        <a type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#loginmodal"><i class="fa fa-plus"></i>
                            Create Feedback
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <style>
                .custom-modal {
                    max-width: 500px;
                    width: 100%;
                }
            </style>
             <!-- login modal -->
            <div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog custom-modal" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title text-center mt-10" id="exampleModalLabel">Create Feed Back</h3>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('user.feed.back.create') }}">
                                @csrf
                                <div class="mt-2">
                                    <label class="form-group">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                </div>
                                <div class="mt-2">
                                    <label class="form-group">Category</label>
                                    <input type="text" name="category" class="form-control" placeholder="Category">
                                </div>
                                <div class="mt-2">
                                    <label class="form-group">Description</label>
                                    <textarea name="description" placeholder="Enter Feedback description" class="form-control" id="" cols="" rows=""></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th width="8%">ID</th>
                                    <th width="8%">user Name</th>
                                    <th width="15%">Title</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Category</th>
                                    <th width="5%">Vote</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user_feedback as $key => $feedback)
                                <tr class="odd">
                                    <td>{{ $feedback->id }}</td>
                                    <td>
                                        <a href="{{ route('feedback.show', ['id' => $feedback->id]) }}">{{ $feedback->title }}</a>
                                    </td>
                                    <td>
                                        {{ $feedback->users->name }}
                                    </td>
                                    <td>{{ $feedback->description }}</td>
                                    <td>{{ $feedback->category }}</td>
                                    <td>
                                        <button class="increment-button">
                                            <i class="fa fa-plus"></i>
                                            <span class="counter">0</span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
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
        $('.increment-button').click(function () {
            var counterElement = $(this).find('.counter');
            var currentValue = parseInt(counterElement.text()) || 0;
            var newValue = currentValue + 1;
            counterElement.text(newValue);
        });
    });
    </script>

</body>
</html>
