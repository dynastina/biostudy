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

		<style>
        @media only screen and (max-width: 1000px) {
            .logo-space img {
                width: 300px !important;
            }

            .logo-space h2 {
                text-align: center !important;
            }
        }
        
		@media only screen and (max-width: 400px) {
            .mobile-responsive {
                margin-bottom: 120px !important;
            }
        }

		#preloader {
			position: fixed;
			top:0;
			left:0;
			right:0;
			bottom:0;
			background-color:#FFF; /* change if the mask should have another color then white */
			z-index:99999; /* makes sure it stays on top */
		}
		#status {
			width:100px;
			height:100px;
			position:absolute;
			left:50%; /* centers the loading animation horizontally one the screen */
			top:50%; /* centers the loading animation vertically one the screen */
			background-image:url("{{ asset('img/triadhipa-icon-mobile.webp') }}");
			z-index:9999; /* path to your loading animation */
			background-repeat:no-repeat;
			background-position:center;
			background-size: cover;
			margin:-50px 0 0 -50px; /* is width and height divided by two */
		}

		@keyframes status {
			0% {
				transform: scale(1.0);
				-webkit-transform: scale(1.0);
			}
			100% {
				transform: scale(2.0);
				-webkit-transform: scale(2.0);
			}
		}

		#status {
			animation: status 2s ease-in-out infinite alternate;
			-webkit-animation: status 2s ease-in-out infinite alternate;
		}

    </style>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<div id="preloader">
			<div id="status">
			</div>
		</div>
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
				<div class="d-flex flex-center w-lg-50 mobile-responsive">
					
                    {{-- content --}}
                    @yield('content')

				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->

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

		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset('metronic/dist') }}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset('metronic/dist') }}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->

		<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
		<script    type="text/javascript">
			$(window).load(function() { // makes sure the whole site is loaded
			$('#status').fadeOut(); // will first fade out the loading animation
			$('#preloader').delay(50).fadeOut(100); // will fade out the white DIV that covers the website.
			$('body').delay(50).css({'overflow':'visible'});
			})
		</script>

        {{-- Includable JS --}}
        @yield('scripts')
	</body>
	<!--end::Body-->
</html>