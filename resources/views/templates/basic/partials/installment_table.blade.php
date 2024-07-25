<div class="row gy-3">
    <div class="col-lg-12">
        <div class="card custom--card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table--responsive--md">
                        <thead>
                            <tr>
                                <th>@lang('S.N.')</th>
                                <th>@lang('Installment Date')</th>
                                <th>@lang('Given On')</th>
                                <th>@lang('Delay')</th>
                                <th>@lang('Penality Charges')</th>
                                <th>@lang('Return')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($installments as $installment)
                                <tr>
                                    <td>{{ $loop->index + $installments->firstItem() }}</td>
                                    <td
                                        class="{{ !$installment->given_at && $installment->installment_date <= today() ? 'text--danger' : '' }}">
                                        {{ showDateTime($installment->installment_date, 'd M, Y') }}
                                    </td>
                                    <td>
                                        @if ($installment->given_at)
                                            {{ showDateTime($installment->given_at, 'd M, Y') }}
                                        @else
                                            <small>@lang('Not yet')</small>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($installment->given_at)
                                            {{ $installment->given_at->diffInDays($installment->installment_date) }}
                                            @lang('Day')
                                        @else

                                            ...

                                        @endif
                                    </td> --}}
                                    <td>
                                        @php
                                            $today = now();
                                            $installmentDate = \Carbon\Carbon::parse($installment->installment_date);
                                            $daysDiff = $installmentDate->diffInDays($today, false);
                                        @endphp
                                        @if ($installment->given_at)
                                            N/A
                                        @else
                                            @if ($daysDiff <= 0)
                                                N/A
                                            @else

                                                {{ $daysDiff }} @lang('days')

                                            @endif
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($installment->given_at)
                                            {{ showDateTime($installment->given_at, 'd M, Y') }}
                                        @else
                                            <small>{{ $general->cur_text }}</small>
                                        @endif
                                    </td> --}}
                                    <td>
                                        @if (!$installment->given_at && $installment->installment_date < today())
                                            {{ number_format($installment->delay_charge, 2) }} TZS
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    {{-- <td>
                                        @if ($installment->status == 'payed')
                                            <div class="value">
                                                <button class="btn btn--success btn--sm disabled">
                                                    <i class="las la-check"></i> @lang('Payed')
                                                </button>
                                            </div>
                                        @elseif ($installment->given_at)
                                            <div class="value">
                                                <a class="btn btn--outline-success btn--sm" style="color: #28a745;"
                                                    href="{{ route('user.loan.installment.preview', $installment->id) }}">
                                                    <i class="las la-wallet"></i> @lang('Payback')
                                                </a>
                                            </div>
                                        @else
                                            @php
                                                $today = now()->startOfDay();
                                                $installmentDate = \Carbon\Carbon::parse($installment->installment_date)->startOfDay();
                                                $isCurrentOrPrevious = $installmentDate <= $today;
                                                $buttonClass = $isCurrentOrPrevious ? 'btn--outline-warning' : 'btn--outline-danger';
                                                $buttonText = $isCurrentOrPrevious ? __('Payback') : __('Waiting');
                                            @endphp
                                            <div class="value">
                                                <a class="btn btn--sm {{ $buttonClass }} {{ $isCurrentOrPrevious ? '' : 'disabled' }}"
                                                    href="{{ $isCurrentOrPrevious ? route('user.loan.installment.preview', $installment->id) : '#' }}">
                                                    <i class="las la-wallet"></i> {{ $buttonText }}
                                                </a>
                                            </div>
                                        @endif
                                    </td> --}}

                                    <td>
                                        @if ($installment->status == 'payed')
                                            <div class="value">
                                                <button class="btn btn--success btn--sm disabled">
                                                    <i class="las la-check"></i> @lang('Payed')
                                                </button>
                                            </div>
                                        @elseif ($installment->given_at)
                                            <div class="value">
                                                <a class="btn btn--outline-success btn--sm" style="color: #28a745;"
                                                    href="{{ route('user.loan.installment.preview', $installment->id) }}">
                                                    <i class="las la-wallet"></i> @lang('Payback')
                                                </a>
                                            </div>
                                        @else
                                            @php
                                                $today = now()->format('Y-m-d');
                                                $installmentDate = \Carbon\Carbon::parse($installment->installment_date)->format('Y-m-d');
                                                $isCurrentOrPrevious = $installmentDate <= $today;
                                                $buttonClass = $isCurrentOrPrevious ? 'btn--outline-warning' : 'btn--outline-danger';
                                                $buttonText = $isCurrentOrPrevious ? __('Payback') : __('Waiting');
                                                $buttonUrl = $isCurrentOrPrevious ? route('user.loan.installment.preview', $installment->id) : '#';
                                            @endphp
                                            <div class="value">
                                                <a class="btn btn--sm {{ $buttonClass }} {{ $isCurrentOrPrevious ? '' : 'disabled' }}"
                                                    href="{{ $buttonUrl }}">
                                                    <i class="las la-wallet"></i> {{ $buttonText }}
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                    
                                    
                                    

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($installments->hasPages())
            <div class="text-center py-3">
                {{ paginateLinks($installments) }}
            </div>
        @endif
    </div>
</div>

@push('style')
    <style>
        .list-group {
            gap: 0.8rem;
        }

        .list-group-item {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            border: 0;
            padding: 0;
        }

        .caption {
            font-size: 0.8rem;
            color: #b1b1b1;
            line-height: 1;
        }

        .value {
            color: #686a81;
            font-weight: 500;
            line-height: 1.8;
        }
    </style>
@endpush
