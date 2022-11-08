<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ Metronic::printAttrs('html') }} {{ Metronic::printClasses('html') }}>
	<!--begin::Head-->
	<head>
		<title>@yield('title', $pageTitle ?? '')</title>
		<meta charset="utf-8" />
		<meta name="description" content="Triadhipa Logistics - One Best Expedition Solution for your Business Need, We care your shipments, we care your business growth" />
		<meta name="keywords" content="trd, trd.co.id, Triadhipa, Logistics, Triadhipa Logistics, Zamasco" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Triadhipa Logistics - One Best Expedition Solution for your Business Need" />
		<meta property="og:url" content="https://trd.co.id/triadhipa/" />
		<meta property="og:site_name" content="Triadhipa Logistics" />
		<link rel="canonical" href="https://trd.co.id/triadhipa/" />
		<link rel="shortcut icon" href="{{ asset('img/triadhipa-icon.webp') }}" />
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{ asset('metronic/dist') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/dist') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

        <style>
            @media only screen and (max-width: 1000px) {
                .logo-space img{
                    width: 300px !important;
                }
                .logo-space h2{
                    text-align: center!important;
                }
            }
        </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{ asset('metronic/dist') }}/assets/media/auth/bg4.jpg'); } [data-theme="dark"] body { background-image: url('{{ asset('metronic/dist') }}/assets/media/auth/bg4-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid flex-lg-row">
				<!--begin::Aside-->
				<div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10 logo-space">
					<!--begin::Aside-->
					<div class="d-flex flex-center flex-lg-start flex-column">
						<!--begin::Logo-->
                        <img alt="Triadhipa Logistics Logo" src="{{ asset('img/triadhipa-logo.webp') }}" style="max-width:500px;"/>
						<!--end::Logo-->
						<!--begin::Title-->
						<h2 class="text-white fw-normal m-0">Triadhipa Logistics - One Best Expedition Solution for your Business Need</h2>
						<!--end::Title-->
					</div>
					<!--begin::Aside-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-center w-lg-50 p-10">
					
                    {{-- content --}}
                    @yield('content')

				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('metronic/dist') }}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('metronic/dist') }}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->

		<!--begin::Custom Javascript(used for this page only)-->
		<script src="{{ asset('metronic/dist') }}/assets/js/custom/authentication/sign-in/general.js"></script>

		<!--end::Custom Javascript-->
		<!--end::Javascript-->

        <script>
            // var HOST_URL = "route('quick-search')";
            var HOST_URL = "";
        </script>

        {{-- Global Config (global config for global JS scripts) --}}
        <script>
            var KTAppSettings = {!! json_encode(config('layout.js'), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES) !!};
        </script>

        {{-- Global Theme JS Bundle (used by all pages)  --}}
        @foreach(config('layout.resources.js') as $script)
        <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach

        {{-- Includable JS --}}
        @yield('scripts')
	</body>
	<!--end::Body-->
</html>