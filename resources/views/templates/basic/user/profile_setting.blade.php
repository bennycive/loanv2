@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-inner">
        <div class="mb-4">
            <h3 class="mb-2">{{ __($pageTitle) }}</h3>
        </div>
        <div class="row gy-4 justify-content-center mb-5">
            <div class="col-8 col-md-4 col-lg-4">
                <div class="card custom--card">
                    <div class="card-body p-3">
                        {{-- <div class="proifle-image-preview">
                            <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, true) }}" alt="profile-image">
                        </div> --}}
                        <div class="profile-image-preview">
                            @if (!empty($user->image))
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, true) }}"
                                    alt="profile-image">
                            @else
                                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="default-logo">
                            @endif
                        </div>




                        <ul class="list-group list-group-flush mt-3">
                            <li class="list-group-item d-flex flex-column gap-1 aling-items-center">
                                <h6><i class="la la-user"></i> {{ $user->username }}</h6>
                            </li>

                            <li class="list-group-item d-flex flex-column gap-1 aling-items-center">
                                <h6><i class="la la-envelope"></i> {{ $user->email }}</h6>
                            </li>

                            <li class="list-group-item d-flex flex-column gap-1 aling-items-center">
                                <h6><i class="la la-mobile"></i> +{{ $user->mobile }}</h6>
                            </li>

                            <li class="list-group-item d-flex flex-column gap-1 aling-items-center">
                                <h6><i class="la la-globe"></i> {{ $user->address->country }}</h6>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-10 col-lg-8">
                <div class="card custom--card">
                    <div class="card-body">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('First Name')</label>
                                        <input type="text" class="form-control form--control" name="firstname"
                                            value="{{ $user->firstname }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Last Name')</label>
                                        <input type="text" class="form-control form--control" name="lastname"
                                            value="{{ $user->lastname }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('State')</label>
                                        <input type="text" class="form-control form--control" name="state"
                                            value="{{ @$user->address->state }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Zip Code')</label>
                                        <input type="text" class="form-control form--control" name="zip"
                                            value="{{ @$user->address->zip }}">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('City')</label>
                                        <input type="text" class="form-control form--control" name="city"
                                            value="{{ @$user->address->city }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Image')</label>
                                        <input class="form-control form--control" id="imageUpload" name="image"
                                            type='file' accept=".png, .jpg, .jpeg" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Address')</label>
                                        <input type="text" class="form-control form--control" name="address"
                                            value="{{ @$user->address->address }}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn--base mt-3 w-100">@lang('Submit')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Attachments parts of the customer --}}
        <div class="mb-4 pl-4">
            <h3 class="mb-2 pl-8">@lang('Attachments')</h3>
        </div>
        <div class="row gy-4 justify-content-center mt-8">
            <div class="col-10 col-md-10 col-sm-10 col-lg-6">

                <div class="card">
                    <div class="card-body">
                        {{-- <div class="accordion" id="attachmentsAccordion">
                            @if ($attachments->isNotEmpty())
                                @foreach ($attachments as $index => $attachment)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                Attachment Type: {{ $attachment->attachment_type }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#attachmentsAccordion">
                                            <div class="accordion-body">
                                                <!-- NIN -->
                                                @if ($attachment->attachment_type === 'NIN')
                                                    <h6>NIN Number: {{ $attachment->nin_number }}</h6>
                                                @endif

                                                <!-- Voter ID -->
                                                @if ($attachment->attachment_type === 'VoterID')
                                                    <h6>Voter ID Number: {{ $attachment->voter_id_number }}</h6>
                                                @endif

                                                <!-- Driving License -->
                                                @if ($attachment->attachment_type === 'DrivingLicense')
                                                    <h6>License Number: {{ $attachment->license_number }}</h6>
                                                    <h6>License Category: {{ $attachment->license_category }}</h6>
                                                @endif

                                                <!-- Display Front Image -->
                                                @if (!empty($attachment->front_image))
                                                    <div class="mt-3 mb-2" style="min-height:30px">
                                                        <h6>Front Image:</h6>
                                                        <img src="{{ asset('storage/' . $attachment->front_image) }}"
                                                            alt="Front Image" class="img-fluid border border-success"
                                                            style="max-width: 100%; height: auto; border-radius:10px;">
                                                    </div>
                                                @endif

                                                <!-- Display Back Image -->
                                                @if (!empty($attachment->back_image))
                                                    <div class="mt-3">
                                                        <h6>Back Image:</h6>
                                                        <img src="{{ asset('storage/' . $attachment->back_image) }}"
                                                            alt="Back Image" class="img-fluid border border-success"
                                                            style="max-width: 100%; height: auto; border-radius:10px;">
                                                    </div>
                                                @endif

                                                <!-- Delete Button -->
                                                <button type="button" class="btn btn-lg btn-outline-danger mt-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $attachment->id }}">
                                                    Delete
                                                </button>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal{{ $attachment->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteModalLabel{{ $attachment->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel{{ $attachment->id }}">Confirm
                                                                    Deletion</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this attachment?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('user.attachments.destroy', $attachment->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No attachments available for this user.</p>
                            @endif
                        </div> --}}

                        <div class="accordion" id="attachmentsAccordion">
                            @if ($attachments->isNotEmpty())
                                @foreach ($attachments as $index => $attachment)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading{{ $index }}">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}"
                                                aria-expanded="false" aria-controls="collapse{{ $index }}">
                                                Attachment Type: {{ $attachment->attachment_type }}
                                            </button>
                                        </h2>
                                        <div id="collapse{{ $index }}" class="accordion-collapse collapse"
                                            aria-labelledby="heading{{ $index }}"
                                            data-bs-parent="#attachmentsAccordion">
                                            <div class="accordion-body">
                                                <!-- NIN -->
                                                @if ($attachment->attachment_type === 'NIN')
                                                    <h6>NIN Number: {{ $attachment->nin_number }}</h6>
                                                @endif

                                                <!-- Voter ID -->
                                                @if ($attachment->attachment_type === 'VoterID')
                                                    <h6>Voter ID Number: {{ $attachment->voter_id_number }}</h6>
                                                @endif

                                                <!-- Driving License -->
                                                @if ($attachment->attachment_type === 'DrivingLicense')
                                                    <h6>License Number: {{ $attachment->license_number }}</h6>
                                                    <h6>License Category: {{ $attachment->license_category }}</h6>
                                                @endif

                                                <!-- Display PDF Preview Button -->
                                                @if ($attachment->attachment_format === 'pdf' && !empty($attachment->documents))
                                                    <div class="mt-3">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#pdfModal{{ $index }}">
                                                            Preview PDF
                                                        </button>

                                                        <!-- PDF Preview Modal -->
                                                        <div class="modal fade " id="pdfModal{{ $index }}"
                                                            tabindex="-1"
                                                            aria-labelledby="pdfModalLabel{{ $index }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="pdfModalLabel{{ $index }}">PDF
                                                                            Preview</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <embed
                                                                            src="{{ asset('storage/' . $attachment->documents) }}"
                                                                            type="application/pdf" width="100%"
                                                                            height="600px">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <!-- Display Front Image -->
                                                @if ($attachment->attachment_format === 'image' && !empty($attachment->front_image))
                                                    <div class="mt-3 mb-2" style="min-height:30px">
                                                        <h6>Front Image:</h6>
                                                        <img src="{{ asset('storage/' . $attachment->front_image) }}"
                                                            alt="Front Image" class="img-fluid border border-success"
                                                            style="max-width: 100%; height: auto; border-radius:10px;">
                                                    </div>
                                                @endif

                                                <!-- Display Back Image -->
                                                @if ($attachment->attachment_format === 'image' && !empty($attachment->back_image))
                                                    <div class="mt-3">
                                                        <h6>Back Image:</h6>
                                                        <img src="{{ asset('storage/' . $attachment->back_image) }}"
                                                            alt="Back Image" class="img-fluid border border-success"
                                                            style="max-width: 100%; height: auto; border-radius:10px;">
                                                    </div>
                                                @endif

                                                <!-- Delete Button -->
                                                <button type="button" class="btn btn-lg btn-outline-danger mt-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $attachment->id }}">
                                                    Delete
                                                </button>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal{{ $attachment->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="deleteModalLabel{{ $attachment->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteModalLabel{{ $attachment->id }}">Confirm
                                                                    Deletion</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete this attachment?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel</button>
                                                                <form
                                                                    action="{{ route('user.attachments.destroy', $attachment->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p>No attachments available for this user.</p>
                            @endif
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-10 col-lg-6">
                <div class="card custom--card">
                    <div class="card-body">
                        {{-- <form class="register" action="{{ route('user.attachments.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Select Attachment Type')</label>
                                        <select id="attachmentType" class="form-control form--control"
                                            name="attachment_type" required>
                                            <option value="" selected disabled>@lang('Choose...')</option>
                                            <option value="NIN">@lang('NIN ID')</option>
                                            <option value="VoterID">@lang('Voter ID')</option>
                                            <option value="DrivingLicense">@lang('Driving License')</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="ninFields" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter NIN Number')</label>
                                        <input type="text" class="form-control form--control" name="nin_number"
                                            maxlength="20" placeholder="Eg 199302126050000553">
                                    </div>
                                </div>

                                <div id="voterIdFields" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter Voter ID Number')</label>
                                        <input type="text" class="form-control form--control" name="voter_id_number"
                                            pattern="T-\d{5}-\d{4}-\d{4}-\d{2}" placeholder="T-12345-6789-1234-12">
                                    </div>
                                </div>

                                <div id="drivingLicenseFields" class="col-lg-12 attachment-fields"
                                    style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Number')</label>
                                        <input type="text" class="form-control form--control" name="license_number"
                                            placeholder="Enter your license number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Category')</label>
                                        <input type="text" class="form-control form--control" name="license_category"
                                            placeholder="Enter your license category">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Upload Front Image')</label>
                                        <input type="file" class="form-control form--control" name="front_image"
                                            accept=".png, .jpg, .jpeg" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Upload Back Image')</label>
                                        <input type="file" class="form-control form--control" name="back_image"
                                            accept=".png, .jpg, .jpeg" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn--base mt-3 w-100">@lang('Submit')</button>
                        </form> --}}

                        <form class="register" action="{{ route('user.attachments.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Attachment Type Selection -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Select Attachment Type')</label>
                                        <select id="attachmentType" class="form-control form--control"
                                            name="attachment_type" required>
                                            <option value="" selected disabled>@lang('Choose...')</option>
                                            <option value="NIN">@lang('NIN ID')</option>
                                            <option value="VoterID">@lang('Voter ID')</option>
                                            <option value="DrivingLicense">@lang('Driving License')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- NIN Fields -->
                                <div id="ninFields" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter NIN Number')</label>
                                        <input type="text" class="form-control form--control" name="nin_number"
                                            maxlength="20" placeholder="Eg 199302126050000553">
                                    </div>
                                </div>

                                <!-- Voter ID Fields -->
                                <div id="voterIdFields" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter Voter ID Number')</label>
                                        <input type="text" class="form-control form--control" name="voter_id_number"
                                            pattern="T-\d{5}-\d{4}-\d{4}-\d{2}" placeholder="T-12345-6789-1234-12">
                                    </div>
                                </div>

                                <!-- Driving License Fields -->
                                <div id="drivingLicenseFields" class="col-lg-12 attachment-fields"
                                    style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Number')</label>
                                        <input type="text" class="form-control form--control" name="license_number"
                                            placeholder="Enter your license number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Category')</label>
                                        <input type="text" class="form-control form--control" name="license_category"
                                            placeholder="Enter your license category">
                                    </div>
                                </div>

                                <!-- Format Selection (PDF or Image) -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Select Attachment Format')</label>
                                        <select id="attachmentFormat" class="form-control form--control"
                                            name="attachment_format" required>
                                            <option value="" selected disabled>@lang('Choose...')</option>
                                            <option value="image">@lang('Image')</option>
                                            <option value="pdf">@lang('PDF Document')</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Front Image Upload -->
                                <div id="frontImageField" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Upload Front Image')</label>
                                        <input type="file" class="form-control form--control" name="front_image"
                                            accept=".png, .jpg, .jpeg">
                                    </div>
                                </div>

                                <!-- Back Image Upload -->
                                <div id="backImageField" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Upload Back Image')</label>
                                        <input type="file" class="form-control form--control" name="back_image"
                                            accept=".png, .jpg, .jpeg">
                                    </div>
                                </div>

                                <!-- PDF Upload -->
                                <div id="pdfUploadField" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Upload PDF Document')</label>
                                        <input type="file" class="form-control form--control" name="documents"
                                            accept=".pdf">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn--base mt-3 w-100">@lang('Submit')</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
@endsection

@push('style')
    <style>
        .list-group-item {
            border: none;
        }

        .user-profile-wrapper {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .profile-info {
            width: 320px;
        }

        .profile-form {
            width: calc(100% - 335px);
        }

        @media(max-width:767px) {
            .user-profile-wrapper {
                gap: 10px;
            }

            .profile-info {
                width: 380px;
            }

            .profile-form {
                width: 380px;
            }
        }

        @media(max-width:590px) {
            .profile-info {
                width: 300px;
            }

            .profile-form {
                width: 300px;
            }
        }

        .proifle-image-preview {
            text-align: center;
        }

        .proifle-image-preview img {
            width: 100%;
            height: auto;
            max-height: 300px;
            border-radius: 5px;
        }


        /* Custom CSS for transparent modal background */
        .modal-transparent .modal-content {
            background-color: rgba(255, 255, 255, 0.8);
            /* Adjust the RGBA value as needed */
            border: none;
            box-shadow: none;
        }

        .modal-transparent .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust the RGBA value for backdrop transparency */
        }

        /* Custom CSS for transparent modal background */
        .modal-transparent .modal-content {
            background-color: rgba(255, 255, 255, 0.9);
            /* Adjust the RGBA value for the content background transparency */
            border: none;
            box-shadow: none;
        }

        .modal-transparent .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            /* Adjust the RGBA value for the backdrop transparency */
        }
    </style>
@endpush

{{-- @push('script')
    <script>
        (function($) {
            "use strict";
            $("#imageUpload").on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('.proifle-image-preview img').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        })(jQuery);
    </script>
@endpush --}}



{{-- @push('script')
    <script>
        (function($) {

            "use strict";
            // Image upload and preview
            $("#imageUpload").on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-image-preview img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Handle attachment type selection
            $('#attachmentType').on('change', function() {
                const selectedType = $(this).val();
                $('.attachment-fields').hide(); // Hide all fields initially
                // Show the selected fields
                if (selectedType === 'NIN') {
                    $('#ninFields').show();
                } else if (selectedType === 'VoterID') {
                    $('#voterIdFields').show();
                } else if (selectedType === 'DrivingLicense') {
                    $('#drivingLicenseFields').show();
                }

                // Display card type and card number
                $('#cardTypeDisplay').text(`Selected Card Type: ${selectedType}`);
                $('#cardNumberDisplay').text('Card Number:');


            });
        })(jQuery);
    </script>
@endpush --}}


@push('script')
    <script>
        (function($) {

            "use strict";

            // Image upload and preview
            $("#imageUpload").on('change', function() {
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('.profile-image-preview img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            // Handle attachment type selection
            $('#attachmentType').on('change', function() {
                const selectedType = $(this).val();
                $('.attachment-fields').hide(); // Hide all fields initially
                // Show the selected fields
                if (selectedType === 'NIN') {
                    $('#ninFields').show();
                } else if (selectedType === 'VoterID') {
                    $('#voterIdFields').show();
                } else if (selectedType === 'DrivingLicense') {
                    $('#drivingLicenseFields').show();
                }

                // Display card type and card number
                $('#cardTypeDisplay').text(`Selected Card Type: ${selectedType}`);
                $('#cardNumberDisplay').text('Card Number:');
            });

            // Handle attachment format selection
            $('#attachmentFormat').on('change', function() {
                const selectedFormat = $(this).val();
                $('#frontImageField, #backImageField, #pdfUploadField').hide(); // Hide all file upload fields

                // Show relevant fields based on attachment format
                if (selectedFormat === 'image') {
                    $('#frontImageField').show();
                    $('#backImageField').show();
                } else if (selectedFormat === 'pdf') {
                    $('#pdfUploadField').show();
                }

                // Set or remove required attributes based on format and type
                if ($('#attachmentType').val() === 'NIN') {
                    // NIN does not require images or PDF
                    {{-- $('#frontImageField input, #backImageField input, #pdfUploadField input').prop('required',false); --}}
                    $('#frontImageField input, #backImageField input, #pdfUploadField input').prop('required',
                        false);
                    $('#frontImageField input, #backImageField input, #pdfUploadField input').val(
                    ''); // Clear any existing values
                } else {
                    if (selectedFormat === 'image') {
                        $('#frontImageField input, #backImageField input').prop('required', true);
                        $('#pdfUploadField input').prop('required', false);
                    } else if (selectedFormat === 'pdf') {
                        $('#frontImageField input, #backImageField input').prop('required', false);
                        $('#pdfUploadField input').prop('required', true);
                    }
                }
            });

        })(jQuery);
    </script>
@endpush
