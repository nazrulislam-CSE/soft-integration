<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css ')}}">
    <link href="../assets/vendor/fonts/circular-std/style.css ')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/css/style.css ') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/fonts/fontawesome/css/fontawesome-all.css ')}}">

    <!-- toastr css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header">
                <h3 class="mb-1 text-center">Admin Login</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" id="email" type="email" placeholder="Email" autocomplete="off">
                        @error('email')
                            <div class="text-danger" style="font-weight: bold;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                        @error('password')
                            <div class="text-danger" style="font-weight: bold;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
                <style type="text/css">
                    table, tbody, tfoot, thead, tr, th, td{
                        border: 1px solid #dee2e6 !important;
                    }
                    th{
                        font-weight: bolder !important;
                    }
                    .custom_input input, button, select, optgroup, textarea {
                        margin: 0;
                        font-family: inherit;
                        font-size: inherit;
                        line-height: inherit;
                        border: none;
                        width: 72px;
                    }
                </style>
                <!--<div class="mt-4">-->
                <!--    <table class="table table-bordered custom_input">-->
                <!--        <tbody>-->
                <!--            <tr>-->
                <!--                <td>admin@gmail.com</td>-->
                <!--                <td><input type="password" name="" value="12345678" disabled></td>-->
                <!--                <td><button  class="btn btn-info btn-xs" onclick="autoFill()">Copy</button></td>-->
                <!--            </tr>-->
                <!--        </tbody>-->
                <!--    </table>-->
                <!--</div>-->
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('register') }}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('password.request') }}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{ asset('backend/assets/vendor/jquery/jquery-3.3.1.min.js ') }}"></script>
    <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.js ') }}"></script>

    <!-- toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- all toastr message show -->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
    </script>

    <!-- 3 color toastr message show -->
    <script type="text/javascript">
        @if(Session::has('success'))
            toastr.success("{{Session::get('success') }}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{Session::get('warning') }}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info') }}");
        @endif
    </script>

    <!-- copy to password show  -->
    <script type="text/javascript">
        function autoFill(){
            $('#email').val('admin@gmail.com');
            $('#password').val('12345678');
        }
    </script>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
          'use strict'

          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')

          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }

                form.classList.add('was-validated')
              }, false)
            })
        })()
    </script>
</body>
 
</html>