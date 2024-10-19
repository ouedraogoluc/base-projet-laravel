@extends('admin.admin_dashboard')
@section('admin')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Liste des roles</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('add.roles') }}" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Ajouter un role</a>
        </div>
    </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table">
                      <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Nom des rôles </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($roles as $key=> $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>

                                <td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="{{ route('edit.roles', $item->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ route('delete.roles', $item->id) }}"  id="delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
