@extends('admin.admin_dashboard')
@section('admin')

<div class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                <div class="mb-3 mb-md-0">
                    <h4 class="page-title mb-1 fw-bold">Modification profil</h4>
                </div>
                <div><a class="btn btn-primary" href="{{ route('admin.profile') }}">Profil</a>
                </div>
            </div>
        </div>
       </div>
    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" >
    @csrf
        <div class="card-box">
            <h3 class="card-title">Informations</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-img-wrap">
                        <img  class="inline-block" src="{{ (!empty($editData->profile_photo_path))? url('upload/admin_images/'.$editData->profile_photo_path):url('backend/img/user.jpg') }}"  id="showImage">
                        <div class="fileupload btn">
                            <span class="btn-text">Changer</span>
                            <input class="upload" type="file"  name="profile_photo_path" class="form-control" id="images">
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control floating" value="{{$editData->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">E-mail <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control floating" value="{{$editData->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Telephone <span class="text-danger">*</span></label>
                                    <input class="form-control floating" type="number" name="phone" value="{{$editData->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Adresse <span class="text-danger">*</span></label>
                                    <input class="form-control floating" type="text" name="address" value="{{$editData->address}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-t-20">
                <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </div>

    </form>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#images').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
			 $('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>
@endsection
