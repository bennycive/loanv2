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
        {{-- <div class="mb-4 pl-4">
            <h3 class="mb-2 pl-8">@lang('Attachments')</h3>
        </div>
        <div class="row gy-4 justify-content-center mt-8">
            <div class="col-10 col-md-10 col-sm-10 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-image-preview attachments-image">
                            @if (!empty($user->image))
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, true) }}"
                                    alt="attachments">
                            @else
                                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="attachments">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-10 col-lg-6">
                <div class="card custom--card">
                    <div class="card-body">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Attachment Type')</label>
                                        <select class="form-control form--control" id="attachmentType"
                                            name="attachment_type">
                                            <option value="voter_id">@lang('Voter ID')</option>
                                            <option value="nin_id">@lang('NIN ID')</option>
                                            <option value="driving_license">@lang('Driving License')</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Front of Card')</label>
                                        <input class="form-control form--control" id="frontImageUpload"
                                            name="front_image" type='file' accept=".png, .jpg, .jpeg" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Back of Card')</label>
                                        <input class="form-control form--control" id="backImageUpload" name="back_image"
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
        </div> --}}

        <div class="row gy-4 justify-content-center mt-8">
            <div class="col-10 col-md-10 col-sm-10 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-image-preview attachments-image">
                            @if (!empty($user->image))
                                <img src="{{ getImage(getFilePath('userProfile') . '/' . $user->image, null, true) }}"
                                    alt="attachments">
                            @else
                                <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="attachments">
                            @endif
                        </div>
                        <div class="mt-3">
                            <h5 id="cardTypeDisplay">Selected Card Type: N/A</h5>
                            <h6 id="cardNumberDisplay">Card Number: N/A</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-10 col-lg-6">
                <div class="card custom--card">
                    <div class="card-body">
                        <form class="register" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Select Attachment Type')</label>
                                        <select id="attachmentType" class="form-control form--control" required>
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
                                            maxlength="20">
                                    </div>
                                </div>

                                <div id="voterIdFields" class="col-lg-12 attachment-fields" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter Voter ID Number')</label>
                                        <input type="text" class="form-control form--control" name="voter_id_number"
                                            pattern="T-\d{5}-\d{4}-\d{4}-\d{2}">
                                    </div>
                                </div>

                                <div id="drivingLicenseFields" class="col-lg-12 attachment-fields"
                                    style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Number')</label>
                                        <input type="text" class="form-control form--control" name="license_number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">@lang('Enter License Category')</label>
                                        <input type="text" class="form-control form--control" name="license_category">
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
        document.getElementById('attachmentType').addEventListener('change', function() {
            const selectedType = this.value;
            const attachmentFields = document.querySelectorAll('.attachment-fields');

            // Hide all fields initially
            attachmentFields.forEach(field => field.style.display = 'none');

            // Show the selected fields
            if (selectedType === 'NIN') {
                document.getElementById('ninFields').style.display = 'block';
            } else if (selectedType === 'VoterID') {
                document.getElementById('voterIdFields').style.display = 'block';
            } else if (selectedType === 'DrivingLicense') {
                document.getElementById('drivingLicenseFields').style.display = 'block';
            }

            // Display card type and card number
            document.getElementById('cardTypeDisplay').innerText = `Selected Card Type: ${selectedType}`;
            document.getElementById('cardNumberDisplay').innerText = 'Card Number:';
        });
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
        })(jQuery);
    </script>
@endpush



