@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-inner">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <h3 class="mb-2">{{ __($pageTitle) }}</h3>
                        
                    </div>
                    <p>@lang('Return installments using our system\'s gateway. The amount will be deducted from your phone account. See your phone to complete transactions.')</p>
                </div>

                <form action="{{ route('user.loan.installment.return') }}" method="post">
                    @csrf
                    <input type="hidden" name="installment_id" value="{{ $installment_id }}">
                    <div class="card custom--card">
                        <div class="card-body">
                            <!-- Select Gateway -->
                            <div class="form-group">
                                <label class="form-label">@lang('Select Gateway')</label>
                                <select class="form-control form-select" name="gateway" required>
                                    <option value="">@lang('Select One')</option>
                                    @foreach ($gatewayCurrency as $data)
                                        <option value="{{ $data->method_code }}" {{ old('gateway') == $data->method_code ? 'selected' : '' }}>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Phone Number -->
                            <div class="form-group">
                                <label class="form-label">@lang('Phone Number')</label>
                                <div class="input-group">
                                    <input type="text" name="phone_number" class="form-control form--control" value="{{ old('phone_number') }}" autocomplete="off" required placeholder="@lang('Enter your phone number')">
                                </div>
                            </div>
                            <!-- Amount -->
                            <div class="form-group">
                                <label class="form-label">@lang('Amount')</label>
                                <div class="input-group">
                                    <input type="text" name="amount" class="form-control form--control" value="{{ $totalAmount }}" autocomplete="off" required placeholder="@lang('Enter the amount to Deposit')" readonly>
                                    <span class="input-group-text">{{ $general->cur_text }}</span>
                                </div>
                            </div>
                            <!-- Preview Details (optional) -->
                            <div class="mt-3 preview-details d-none">
                                <!-- Additional details if needed -->
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 mt-3">@lang('Submit')</button>
                        </div>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        (function($) {
            "use strict";
            $('select[name=gateway]').change(function() {
                if (!$('select[name=gateway]').val()) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                var resource = $('select[name=gateway] option:selected').data('gateway');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                if (resource.method.crypto == 1) {
                    var toFixedDigit = 8;
                    $('.crypto_currency').removeClass('d-none');
                } else {
                    var toFixedDigit = 2;
                    $('.crypto_currency').addClass('d-none');
                }
                $('.min').text(parseFloat(resource.min_amount).toFixed(2));
                $('.max').text(parseFloat(resource.max_amount).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }
                if (amount <= 0) {
                    $('.preview-details').addClass('d-none');
                    return false;
                }
                $('.preview-details').removeClass('d-none');
                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                var payable = parseFloat((parseFloat(amount) + parseFloat(charge))).toFixed(2);
                $('.payable').text(payable);
                var final_amo = (parseFloat((parseFloat(amount) + parseFloat(charge))) * rate).toFixed(
                    toFixedDigit);
                $('.final_amo').text(final_amo);
                if (resource.currency != '{{ $general->cur_text }}') {
                    var rateElement =
                        `<span class="fw-bold">@lang('Conversion Rate')</span> <span><span  class="fw-bold">1 {{ __($general->cur_text) }} = <span class="rate">${rate}</span>  <span class="method_currency">${resource.currency}</span></span></span>`;
                    $('.rate-element').html(rateElement)
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                } else {
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                $('.method_currency').text(resource.currency);
                $('input[name=currency]').val(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input', function() {
                $('select[name=gateway]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
    </script>
@endpush
