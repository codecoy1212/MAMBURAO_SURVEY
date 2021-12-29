@extends('scripts')

@section('up_title', $vbl->cat_name)
@section('first_ref', 'Settings')
@section('second_ref', $vbl->cat_name)
@section('pg_act_2', 'breadcrumb--active')
@section('pg_act_se','side-menu--active')

<?php $add = route('set');?>
@section('first_add',$add)


@if ($vbl->cat_name == "NENE")
<?php $add = route('table_d',['id' => 1]);?> @section('second_add',$add)
@elseif ($vbl->cat_name == "PHILIP")
<?php $add = route('table_d',['id' => 2]);?> @section('second_add',$add)
@elseif ($vbl->cat_name == "ERIC")
<?php $add = route('table_d',['id' => 3]);?> @section('second_add',$add)
@endif

@section('main_content')

<div class="intro-y flex flex-col sm:flex-row items-center mt-0">
    <h2 class="text-lg font-medium mr-auto ml-2">
        {{$vbl->cat_name }} USERS
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        {{-- <button class="add_school_btn button text-white bg-theme-9 shadow-md mr-2">Add School</button> --}}
    </div>
</div>


    <!-- BEGIN: Datatable -->
<div class="intro-y datatable-wrapper box p-5 mt-5">
    <table id="user_tables" class="table table-report table-report--bordered display w-full">
        <thead>
            <tr>
                <th class="border-b-2 whitespace-no-wrap">Table</th>

                <th class="border-b-2 whitespace-no-wrap">Password</th>

                <th class="border-b-2 whitespace-no-wrap">Database</th>

                <th class="border-b-2 whitespace-no-wrap">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<!-- END: Datatable -->


<div class="modal" id="edit_pass_modal">
    <div class="modal__content">
        <div class="px-5 pb-0"><br>
           <div style="font-size:25px">Edit Password</div>
        </div>
        <form id="edit_pass_form">
            @csrf
            <input type="hidden" id="update_val_id" name="id">
            <div class="intro-y col-span-12 lg:col-span-8 p-5">
                <div class="grid grid-cols-12 gap-4 row-gap-5">
                    <div class="intro-y col-span-12 px-2">
                        <div class="mb-2">Password</div>
                        <input type="text" name="pass_word" id="edit_pass_id" class="input w-full border flex-1">
                    </div>
                </div><br>
            </div>
            <div class="px-5 pb-8 text-right">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Close</button>
                <button type="submit" id="edit_pass_done" class="button w-24 bg-theme-11 text-white">Update</button>
            </div>
        </form>
    </div>
</div>

<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

  <script>

    $(document).ready(function(){

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var glb_var = "{{$vbl->id}}";

        $('#user_tables').DataTable({
            "processing": false,
            "serverSide": false,
            "responsive": true,
            "autoWidth": false,
            "ajax": "../specific?id="+glb_var+"",
            "columns": [

            { "data": "table_name" },
            { "data": "pass_word" },
            { "data": "db_name" },
            { "data": "action" },

        ]
        });

        $(document).on("click",".update_pass",function(){
            var id2 = $(this).val();
            // console.log(id2);
            $.ajax({
                type:"GET",
                url:'../specific/update',
                data: { id: id2,},
            }).done(function(data){
            // console.log(data);
            $("#edit_pass_id").val(data.pass_word);
            // $("#edit_school_code").val(data.school_code);
            // $("#edit_school_done").val(id2);
            $("#update_val_id").val(id2);
            $("#edit_pass_modal").modal("show");
            });
        });

        $(document).on("submit", "#edit_pass_form", function(e){
            e.preventDefault();
            // console.log(id);

            $.ajax({
                type: 'PUT',
                url: '../specific/update/done',
                data: $('#edit_pass_form').serialize(),
              success: function (response){
                // console.log(response);
                $('#edit_pass_modal').modal('hide');
                toastr.success("Password Changed");
                // alert("Subject Updated.");
                var table =  $('#user_tables').DataTable();
                table.ajax.reload();
              },
              error: function (error){
                // console.log(error);
                $.each(error.responseJSON,function(key,value) {
                toastr.error(value[0]);
                // $("#update_subject_errors").append(`<li>`+value[0]+`</li>`);
                });

                // alert("Subject Not Updated.");
              }
            });
        });
    });

</script>



@endsection()
