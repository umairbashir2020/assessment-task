
<!DOCTYPE html>
<html lang="en">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@include('admin.include.head')

<body>
    <style>
        .pass {
            width: 100%;

            height: 50px;
        }
    </style>
    <div class="bg" style="width: 1349px; z-index: -999999; position: fixed;">
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 text">
                            <h1>Web Product</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>User Login</h3>
                                </div>
                                <div style="float: right">
                                    <a href="{{ route('user.register.index') }}" class="btn btn-info float-right mt-3">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Email" name="email"

                                         class="pass form-control">
                                        @error('email')
                                          <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="Enter Password" name="password"
                                            class="pass form-control">
                                            @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                          @enderror

                                    </div>
                                    <button type="submit"  class="btn btn-info"
                                        style="height:50px !important; width:100%;"> Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</body>
</html>
