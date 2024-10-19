@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>

<div class="content">
    <div class="row mb-3">
        <div class="col-lg-8">
            <h4 class="page-title">Ajouter un Role dans la permission</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="col-lg-12">
    <!--end breadcrumb-->

    <div class="card">
        <div class="card-body p-4">

            <form id="myForm" action="{{ route('role.permission.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Nom du Roles </label>
                    <select name="role_id" class="form-select mb-3" aria-label="Default select example">
                        <option selected="" disabled>Choisir un  Roles</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckMain">
                    <label class="form-check-label" for="flexCheckMain">Permission All </label>
                </div>

                <hr>

                @foreach ($permission_groups as $group)
                <div class="row">
                    <div class="col-3">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault"> {{ $group->group_name }}</label>
                        </div>

                    </div>

                    <div class="col-9">
                        @php
                        $permissions = App\Models\User::getpermissionByGroupName($group->group_name)
                        @endphp

                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="checkDefault{{ $permission->id }}">
                            <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                        <br>

                    </div>

                </div>
                {{-- // end row --}}

                @endforeach



                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <button type="submit" class="btn btn-primary px-4">Enregistrer les modifications</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



<script>
    $('#flexCheckMain').click(function() {
        if ($(this).is(':checked')) {
            $('input[ type=checkbox]').prop('checked', true)
        } else {
            $('input[ type=checkbox]').prop('checked', false)
        }
    });
</script>


@endsection
