@php
    $footerContent = getContent('footer.content', true);
    $ctaContent = getContent('cta.content', true);
    $iconElement = getContent('social_icon.element', false, null, true);
    $policyPages = getContent('policy_pages.element', false, null, true);
@endphp

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="cta">
                <div class="row g-3 align-items-lg-center">
                    <div class="col-12 col-lg-4 col-xl-3">
                        <div class="footer-logo text-center">
                            <img src="{{ getImage('assets/images/logoIcon/logo.png') }}" alt="{{ __($general->site_name ?? 'Site Name') }}" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 col-xl-9">
                        <ul class="list list--row justify-content-center justify-content-md-between align-items-md-center">
                            <li class="list--row__item">
                                <h3 class="text-capitalize mt-0 text-center text-md-start ps-xl-3">
                                    {{ $ctaContent->data_values->heading ?? 'Stay Informed' }}
                                </h3>
                                <p class="text-center text-md-start ps-xl-3">
                                    {{ $ctaContent->data_values->subheading ?? 'Subscribe to our updates' }}
                                </p>
                            </li>
                            <li class="list--row__item">
                                <a href="{{ url($ctaContent->data_values->button_link ?? '#') }}" class="btn btn--base text-capitalize">
                                    {{ $ctaContent->data_values->button_name ?? 'Subscribe' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <h4 class="mt-0 t-text-white text-capitalize">{{ $footerContent->data_values->title ?? 'About Viserloan' }}</h4>
                    <p class="t-text-white t-short-para">
                        {{ $footerContent->data_values->content ?? 'Maecenas tempus tellus egondime honcus sequam seitmet dipiscing sem eque sedipsuNam quam' }}
                    </p>
                    <ul class="list list--row">
                        @if($iconElement)
                            @foreach ($iconElement as $icon)
                                <li class="list--row__item">
                                    <a href="{{ $icon->data_values->url ?? '#' }}" class="t-link social-icon--alt" target="_blank">
                                        @php echo $icon->data_values->social_icon ?? ''; @endphp
                                    </a>
                                </li>
                            @endforeach
                        @else
                            <li class="list--row__item">
                                <a href="#" class="t-link social-icon--alt" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list--row__item">
                                <a href="#" class="t-link social-icon--alt" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="mt-0 t-text-white text-capitalize">@lang('Important Link')</h4>
                    <ul class="list list--column">
                        <li class="list--column__item">
                            <a href="{{ route('loan') }}" class="t-link t-link--primary t-text-white text-capitalize">
                                @lang('Loan Plans')
                            </a>
                        </li>
                        @if(isset($pages))
                            @foreach ($pages as $data)
                                <li class="list--column__item">
                                    <a href="{{ route('pages', [$data->slug]) }}" class="t-link t-link--primary t-text-white text-capitalize">{{ $data->name }}</a>
                                </li>
                            @endforeach
                        @else
                            <li class="list--column__item">
                                <a href="{{ route('about') }}" class="t-link t-link--primary t-text-white text-capitalize">
                                    @lang('About')
                                </a>
                            </li>
                        @endif
                        <li class="list--column__item">
                            <a href="{{ route('contact') }}" class="t-link t-link--primary t-text-white text-capitalize">
                                @lang('Contact Us')
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="mt-0 t-text-white text-capitalize">@lang('Quick Link')</h4>
                    <ul class="list list--column">
                        @if($policyPages)
                            @foreach ($policyPages as $link)
                                <li class="list--column__item">
                                    <a class="t-link t-link--primary t-text-white text-capitalize" href="{{ route('policy.pages', [slug($link->data_values->title ?? ''), $link->id]) }}">{{ $link->data_values->title ?? '' }}</a>
                                </li>
                            @endforeach
                        @else
                            <li class="list--column__item">
                                <a href="{{ route('policy.pages', ['privacy-policy', 1]) }}" class="t-link t-link--primary t-text-white text-capitalize">
                                    @lang('Privacy Policy')
                                </a>
                            </li>
                            <li class="list--column__item">
                                <a href="{{ route('policy.pages', ['terms-of-service', 2]) }}" class="t-link t-link--primary t-text-white text-capitalize">
                                    @lang('Terms Of Service')
                                </a>
                            </li>
                            <li class="list--column__item">
                                <a href="{{ route('policy.pages', ['policy', 3]) }}" class="t-link t-link--primary t-text-white text-capitalize">
                                    @lang('Policy')
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h4 class="mt-0 t-text-white text-capitalize">
                        {{ $footerContent->data_values->subscription_heading ?? 'Newsletter' }}
                    </h4>
                    <p class="t-text-white t-short-para">
                        {{ $footerContent->data_values->subscription_subheading ?? 'Stay Informed and Never Miss a Beat: Subscribe to Our Loan Updates' }}
                    </p>
                    <form class="newsletter t-mt-30">
                        @csrf
                        <input type="email" name="email" class="newsletter__input form-control" placeholder="@lang('Email address')" />
                        <button type="submit" class="newsletter__btn flex-shrink-0">
                            <i class="bx bxs-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p class="mb-0 t-text-white text-center text-capitalize">
            &copy; {{ date('Y') }}
            <a class="base--text" href="{{ route('home') }}">{{ $general->site_name ?? 'Site Name' }}</a>
            @lang('All Rights Reserved').
        </p>
    </div>
</footer>

<a class="scroll-top"><i class="las la-arrow-up"></i></a>

@push('script')
<script>
    (function($) {
        "use strict";

        $('.newsletter').on('submit', function(e) {
            e.preventDefault();
            var data = $('.newsletter').serialize();
            $.ajax({
                type: "POST",
                url: "{{ route('subscribe') }}",
                data: data,
                success: function(response) {
                    if (response.status == 'success') {
                        notify('success', response.message);
                        $('#email').val('');
                    } else {
                        notify('error', response.message);
                    }
                }
            });
        });
    })(jQuery);
</script>
@endpush
