@extends('layouts.admin', ['title' => 'My Profile'])

@section('mainContent')
    <div class="container">
        <div id="uploadMessage"></div>

        <div class="d-flex justify-content-between">
            <div class="d-flex gap-3">
                <div class="rounded-lg">
                    <img id="profileImage"  alt="Profile Image" height="100px">
                    <div>
                        <h2 class="fw-bold font-bold">{{ auth()->user()->name }}</h2>
                        <span class="badge bg-warning fs-6 text-capitalize">{{ auth()->user()->user_type }}</span>
                    </div>
                </div>
            </div>
          
            <div>
                <p>Upload Profile</p>

                <div class="upload-container">
                    <label for="image" class="file-uploader">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-upload" viewBox="0 0 16 16">
                            <!-- SVG code -->
                        </svg>
                        <form id="imageUploadForm" enctype="multipart/form-data">
                            <input type="file" class="d-none" name='image' id="image" />
                        </form>
                    </label>
                </div>

                <div>
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to load the profile image
            function loadProfileImage() {
                // Send AJAX request to fetch the image URL
                $.ajax({
                    url: "{{ route('profile.image-url') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the image source with the fetched URL
                        $('#profileImage').attr('src', "{{ asset('uploads/users/') }}" + '/' + response.imageUrl);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
    
            // Call the loadProfileImage function when the page loads
            loadProfileImage();
    
            // Bind an event listener to the file input change event
            $('#image').on('change', function() {
                // Trigger the form submission when a file is selected
                $('#imageUploadForm').submit();
            });
    
            // Bind an event listener to the form submission
            $('#imageUploadForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                
                // Create FormData object to send the form data
                var formData = new FormData(this);
    
                // Add CSRF token to the FormData object
                formData.append('_token', '{{ csrf_token() }}');
    
                // Send the AJAX request
                $.ajax({
                    url: "{{ route('store.image') }}", // URL to the controller method
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                        // Display success message
                        $('#uploadMessage').html(
                            '<div class="alert alert-success" role="alert">Image uploaded successfully!</div>'
                        );
                        // Reload the profile image
                        loadProfileImage();
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                        // Display error message
                        $('#uploadMessage').html(
                            '<div class="alert alert-danger" role="alert">Error uploading image. Please try again.</div>'
                        );
                    }
                });
            });
        });
    </script>
    
@endsection
