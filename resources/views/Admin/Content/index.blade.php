@extends('Admin.layouts.admin')

@section('content')
    @push('extra-css')
       
        
    @endpush
    <div class="cover-all-content">
        <div class="page-title d-flex align-items-center  gap-3 flex-wrap">
            <div class="">
                <h2>Content</h2>
            </div>
        </div>
        <br>
        <br>
        <div class="cover-datatable">
            <nav>
              <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                    About Us
                </button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                    Privacy Policy
                </button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                    Terms & Conditions
                </button>
              </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                  <div class="card">
                      <div class="card-body">
                          <h2>About Us</h2>
                          <form class="contentForm">
                              @csrf
                              <input type="hidden" name="type" value="about">
                              <div class="row">
                                  <div class="col-12 my-2">
                                     <label>Add Content</label>
                                    <textarea class="editor" name="content" style="height: 50vh;">{{ isset($content->about) ? $content->about : '' }}</textarea>
                                  </div>
                              </div>
                              <button class="btn btn-success">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                   <div class="card">
                      <div class="card-body">
                          <h2>Privacy Policy</h2>
                          <form class="contentForm">
                              @csrf
                              <input type="hidden" name="type" value="privacy">
                              <div class="row">
                                  <div class="col-12 my-2">
                                     <label>Add Content</label>
                                    <textarea class="editor" name="content">{{ isset($content->privacy) ? $content->privacy : '' }}</textarea>
                                  </div>
                              </div>
                              <button class="btn btn-success">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                   <div class="card">
                      <div class="card-body">
                          <h2>Terms & Conditions</h2>
                          <form class="contentForm">
                              @csrf
                              <input type="hidden" name="type" value="terms">
                              <div class="row">
                                  <div class="col-12 my-2">
                                     <label>Add Content</label>
                                    <textarea class="editor" name="content">{{ isset($content->terms) ? $content->terms : '' }}</textarea>
                                  </div>
                              </div>
                              <button class="btn btn-success">Save</button>
                          </form>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    @push('extra-js')
        <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
        <script>
            var allEditors = document.querySelectorAll(".editor");
            for (var i = 0; i < allEditors.length; ++i) {
              ClassicEditor.create(allEditors[i]);
            }
            
            $('.contentForm').on('submit', function(e){
                
                e.preventDefault();
               
               var formData = new FormData(this);
               
               $.ajax({
                   url: '{{ route('contents.store') }}',
                   method: 'POST',
                   data: formData,
                   contentType: false,
                   processData: false,
                   success: function(response)
                   {
                       if (response.status == true) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Updated Successfully!'
                            })
                            location.reload();
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Something went wrong!'
                            })
                        }
                   }
               }) 
                
            });
            
        </script>
    @endpush
@endsection
