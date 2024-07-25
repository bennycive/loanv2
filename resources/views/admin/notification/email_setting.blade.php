@extends('admin.layouts.app')

@section('panel')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <form action="" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label class="mb-4">@lang('Email Send Method')</label>
                        <select name="email_method" class="form-control">
                            <option value="php" @if(is_object($general->mail_config) && $general->mail_config->name == 'php') selected @endif>@lang('PHP Mail')</option>
                            <option value="smtp" @if(is_object($general->mail_config) && $general->mail_config->name == 'smtp') selected @endif>@lang('SMTP')</option>
                            <option value="sendgrid" @if(is_object($general->mail_config) && $general->mail_config->name == 'sendgrid') selected @endif>@lang('SendGrid API')</option>
                            <option value="mailjet" @if(is_object($general->mail_config) && $general->mail_config->name == 'mailjet') selected @endif>@lang('Mailjet API')</option>
                        </select>
                    </div>
                    <!-- SMTP configuration form -->
                    <div class="row mt-4 d-none configForm" id="smtp">
                        <!-- Your SMTP configuration form fields -->
                    </div>
                    <!-- Other configuration forms for SendGrid API and Mailjet API -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                </div>
            </form>
        </div><!-- card end -->
    </div>
</div>

{{-- TEST MAIL MODAL --}}
<div id="testMailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Test Mail Setup')</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.setting.notification.email.test') }}" method="POST">
                @csrf
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('Sent to') </label>
                                <input type="text" name="email" class="form-control" placeholder="@lang('Email Address')">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn--primary w-100 h-45">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('breadcrumb-plugins')
<button type="button" data-bs-target="#testMailModal" data-bs-toggle="modal" class="btn btn-sm btn-outline--primary"><i class="las la-paper-plane"></i> @lang('Send Test Mail')</button>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";

        // Check if $general->mail_config is an object before accessing its properties
        var method = '{{ is_object($general->mail_config) ? $general->mail_config->name : '' }}';
        emailMethod(method);

        $('select[name=email_method]').on('change', function() {
            var method = $(this).val();
            emailMethod(method);
        });

        function emailMethod(method){
            $('.configForm').addClass('d-none');
            if(method != 'php') {
                $(`#${method}`).removeClass('d-none');
            }
        }

    })(jQuery);
</script>
@endpush
