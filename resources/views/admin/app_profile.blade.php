@extends('layouts.admin.app')

@section('content')

<header class="content__title">
    <h1> {{__('Website Setting')}}</h1>
</header>

    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Site Info</h5>

                    <form action="{{route('app.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Business Email</label>
                              <input type="email" name="email" value="{{$profile->email}}" class="form-control" >
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Telephone Number</label>
                              <input type="text" name="telephone" value="{{$profile->telephone}}" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Mobile Number</label>
                              <input type="text" name="mobile" value="{{$profile->mobile}}" class="form-control">
                          </div>
                        </div>
                        
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Facebook</label>
                              <input type="text" name="facebook" value="{{$profile->facebook}}" class="form-control">
                          </div>
                        </div>
                        
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Instagram</label>
                              <input type="text" name="instagram" value="{{$profile->instagram}}" class="form-control">
                          </div>
                        </div>
                        
                        <div class="col-lg-6">
                          <div class="form-group my-2">
                              <label>Whatsapp</label>
                              <input type="text" name="whatsapp" value="{{$profile->whatsapp}}" class="form-control">
                          </div>
                        </div>
                        <div class="col-lg-12">
                          <div class="form-group my-2">
                              <label>Address</label>
                              <textarea class="form-control" name="address" >{{$profile->address}}</textarea>
                          </div>
                        </div>
                        
                        <div class="col-lg-12">
                          <div class="form-group my-2">
                              <label>About Info</label>
                              <textarea type="text" name="intro" class="form-control">{{$profile->intro}}</textarea>
                          </div>
                        </div>
                        <div class="col-lg-12 d-flex justify-content-end">
                          <button class="btn btn-success bs_dashboard_btn bs_btn_color float-right" type="submit">Save Changes</button>
                        </div>                    
                    </div>
                </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('js')
<script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/js/image-uploader.js')}}"></script>
<script>
  // preview image
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview_image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


$(document).on('click', '.cb-value', function() {
    var mainParent = $(this).parent('.toggle-btn');
    if ($(mainParent).find('input.cb-value').is(':checked')) {
        $(mainParent).addClass('active');

        $(this).attr('checked', 'checked');
    } else {
        $(mainParent).removeClass('active');
        $(this).removeAttr('checked');
    }

})

</script>

@endsection