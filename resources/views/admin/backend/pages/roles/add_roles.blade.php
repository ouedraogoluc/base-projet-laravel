@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="content">
    <div class="row mb-3">
        <div class="col-lg-8">
            <h4 class="page-title">Ajouter un Role</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="col-lg-12">
                <form id="myForm" action="{{ route('store.roles') }}" method="post" class="row g-3" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label"> Nom Role </label>
                        <input type="text" name="name" class="form-control" id="input1">
                    </div>


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

@endsection
