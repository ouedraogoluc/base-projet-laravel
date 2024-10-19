@extends('admin.admin_dashboard')
@section('admin')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Liste des permissions</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ route('add.permission') }}" class="btn btn-primary  ">Add Permission </a>
                &nbsp;&nbsp;
                <a href="{{ route('import.permission') }}" class="btn btn-warning ">Import </a>
                &nbsp;&nbsp;
                <a href="{{ route('export') }}" class="btn btn-danger ">Export </a>

            </div>
        </div>
        {{-- <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Employee ID</label>
                    <input type="text" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <label class="focus-label">Employee Name</label>
                    <input type="text" class="form-control floating">
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <label class="focus-label">Role</label>
                    <select class="select floating">
                        <option>Select Role</option>
                        <option>Nurse</option>
                        <option>Pharmacist</option>
                        <option>Laboratorist</option>
                        <option>Accountant</option>
                        <option>Receptionist</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Nom de l'autorisation </th>
                                <th>Nom du groupe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($permissions as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->group_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.permission', $item->id) }}" class="btn btn-info px-5">Edit
                                        </a>
                                        <a href="{{ route('delete.permission', $item->id) }}" class="btn btn-danger px-5"
                                            id="delete">Delete </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
