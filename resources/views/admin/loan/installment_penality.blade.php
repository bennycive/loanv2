@extends('admin.layouts.app')

@section('panel')
<div class="row justify-content-center">
    @if(request()->routeIs('admin.withdraw.charges'))
    <div class="col-lg-12">
        <div class="card b-radius--10">
            <div class="card-header">
                <h5 class="card-title">{{ $pageTitle }}</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive--sm table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>@lang('ID')</th>
                                <th>@lang('Loan ID')</th>
                                <th>@lang('Delay Charge')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($installments as $installment)
                            <tr>
                                <td>{{ $installment->id }}</td>
                                <td>{{ $installment->loan_id }}</td>
                                <td>{{ __($general->cur_sym) }}{{ showAmount($installment->delay_charge) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __('No installment charges found') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            <div class="card-footer py-4">
                <h5 class="card-title">@lang('Total Installment Charges'): {{ __($general->cur_sym) }}{{ showAmount($totalInstallmentCharge) }}</h5>
            </div>
        </div><!-- card end -->
    </div>
    @endif
</div>
@endsection

@push('breadcrumb-plugins')
<x-search-form dateSearch='yes' />
@endpush
