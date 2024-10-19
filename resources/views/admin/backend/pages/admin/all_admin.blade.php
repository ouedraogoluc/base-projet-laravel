@extends('admin.admin_dashboard')
@section('admin')

        <div class="content">
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Liste des administrateurs</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a href="{{ route('add.admin') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Ajouter un administrateur</a>
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
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image </th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Rôle</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alladmin as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> <img
                                            src="{{ !empty($item->photo) ? url('upload/admin_images/' . $item->photo) : url('upload/no_image.jpg') }}"
                                            alt="" style="width: 70px; height:40px;"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone ?? "aucun numero"}}</td>
                                    <td>{{ $item->address ?? "aucun addresse" }}</td>
                                    <td>
                                        @if($item->roles)
                                            @foreach ($item->roles as $role)
                                                <span class="badge badge-pill bg-danger">{{ $role->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('edit.admin', $item->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="{{ route('delete.admin', $item->id) }}"  id="delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
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
