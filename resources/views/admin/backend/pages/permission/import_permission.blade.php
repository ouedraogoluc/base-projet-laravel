@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Telecharger</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="{{ route('export') }}" class="btn btn-warning ">exporter Xlsx </a>
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
                <h5 class="mb-4">Import Permission</h5>
                <form id="myForm" action="{{ route('import') }}" method="post" class="row g-3"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Xlsx File Import</label>
                            <input type="file" name="import_file" class="form-control" id="input1">
                        </div>


                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-primary px-4">Telecharger</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
