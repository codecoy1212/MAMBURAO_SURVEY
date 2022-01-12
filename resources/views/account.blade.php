@extends('scripts')

@section('up_title', 'Settings')
@section('first_ref', 'Account Settings')
@section('pg_act', 'breadcrumb--active')
@section('pg_act_ra', 'side-menu--active')

<?php $add = route('acs');?>
@section('first_add',$add)

@section('main_content')

    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                {{-- <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Dashboard
                    </h2>
                    <a href="" class="ml-auto flex text-theme-1 dark:text-theme-10"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div> --}}
                <div class="grid grid-cols-12 gap-6 mt-5 xl:ml-20 xl:mr-20">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-6 intro-y">
                        <div class="box p-6 border-theme-1 border-2">
                            <form class="my-auto mx-auto bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto" id="chang_pass_form">
                                <input type="hidden" id="update_val_id" name="user_id">
                                @csrf
                                <h2 class="intro-x font-bold text-2xl xl:text-2xl text-center xl:text-left">
                                    Change Password
                                </h2>
                                <p>
                                    <input type="password" name="old_password" id="password1" class="login__input input input--lg border-theme-4 border-2 mt-4" style="width:100%" placeholder="Old Password"/>
                                    <i class="bi bi-eye-slash" id="togglePassword1"></i>
                                </p>
                                <p>
                                <input type="password" name="new_password" id="password" class="login__input input input--lg border-theme-4 border-2 mt-4" style="width:100%" placeholder="New Password"/>
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                                </p>
                                <div class="intro-x mt-5 xl:mt-4 text-center xl:text-left">
                                    <button class="button button--lg w-full text-white xl:mr-3 mb-2" style="background-color: #fd0390;  width:9rem">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

    <script>
        const togglePassword1 = document.querySelector("#togglePassword1");
        const password1 = document.querySelector("#password1");

        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#password");

        togglePassword1.addEventListener("click", function () {
            // toggle the type attribute
            const type = password1.getAttribute("type") === "password" ? "text" : "password";
            password1.setAttribute("type", type);
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        // prevent form submit
        const form = document.querySelector("form");
        form.addEventListener('submit',function(e){
            e.preventDefault();
        });
    </script>

    <script>

        $(document).ready(function(){

            var vbl = "<?php echo $vbl->id; ?>";
            $("#update_val_id").val(vbl);
            // console.log(vbl);

            $(document).on("submit", "#chang_pass_form", function(e){
            e.preventDefault();
            $.ajax({
                type: 'PUT',
                url: 'update_password',
                data: $('#chang_pass_form').serialize(),
              success: function (response){
                // console.log(response);
                $("#password").val("");
                $("#password1").val("");
                toastr.success("Password Updated");
              },
              error: function (error){
                // console.log(error);
                if(error.responseJSON == "Old Password is Incorrect.")
                {
                    toastr.error(error.responseJSON);
                }
                else
                {
                    $.each(error.responseJSON,function(key,value) {
                    toastr.error(value[0]);
                    });
                }

              }
            });
        });
        });

    </script>


@endsection()
