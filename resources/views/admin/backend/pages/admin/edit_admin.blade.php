@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="content">
    <div class="row mb-3">
        <div class="col-lg-8">
            <h4 class="page-title">Edité un admin</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <div class="col-lg-12">
            <form id="myForm" action="{{ route('update.admin',$user->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf

                <div class="row">



                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Nom de l'administrateur</label>
                    <input type="text" name="name" class="form-control" id="input1" value="{{ $user->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Email de l'administrateur</label>
                    <input type="email" name="email" class="form-control" id="input1" value="{{ $user->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Téléphone de l'administrateur</label>
                    <input type="text" name="phone" class="form-control" id="input1" value="{{ $user->phone }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Adresse de l'administrateur</label>
                    <input type="text" name="address" class="form-control" id="input1" value="{{ $user->address }}">
                </div>


                <div class="form-group col-md-12">
                    <label for="input1" class="form-label"> Role </label>
                    <select name="roles" class="form-control select2 mb-3" aria-label="Default select example">
                        <option selected="" disabled>Open this select menu</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}> {{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>



                {{-- <div class="form-group col-md-6">


                    <label for="sexe" class="form-label">Genre</label>
                    <select class="form-control" id="sexe" name="genre">
                        <option value="">choisir un genre</option>
                        <option value="Femme" {{ old('genre', $user->genre ?? 'N/A') == 'Femme' ? 'selected' : '' }}>Femme</option>
                        <option value="Homme" {{ old('genre', $user->genre ?? 'N/A') == 'Homme' ? 'selected' : '' }}>Homme</option>
                    </select>

                </div> --}}
        </div>
        <div class="col-md-12">
            <div class="d-md-flex d-grid align-items-center gap-3">
                <button type="submit" class="btn btn-primary px-4">Sauvegarder les modifications</button>

            </div>
        </div>
                </div>


        </form>
    </div>
</div>
</div>
</div>




</div>


@endsection
