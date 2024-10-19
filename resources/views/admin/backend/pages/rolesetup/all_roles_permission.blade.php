@extends('admin.admin_dashboard')
@section('admin')

<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Liste des roles</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('add.roles.permission') }}" class="btn btn-primary  ">Ajouter Roles Permission </a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Roles  </th>
                            <th>Permission  </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($roles as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                    @foreach ($item->permissions as $prem)
                        <span class="badge bg-danger">{{ $prem->name }}</span>
                    @endforeach

                            </td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{ route('admin.edit.roles', $item->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="{{ route('admin.delete.roles', $item->id) }}"  id="delete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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



</div>

</div>


@endsection
