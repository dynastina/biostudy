<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../"/>
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
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{ asset("metronic/dist") }}/assets/media/auth/bg6.jpg'); } [data-theme="dark"] body { background-image: url('{{ asset("metronic/dist") }}/assets/media/auth/bg6-dark.jpg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Signup Welcome Message -->
			<div class="d-flex flex-column flex-center flex-column-fluid">
				<!--begin::Content-->
				<div class="d-flex flex-column flex-center text-center p-10">
					<!--begin::Wrapper-->
					<div class="card card-flush w-lg-650px py-5">
						<div class="card-body py-15 py-lg-20">
							<!--begin::Logo-->
							<div class="mb-14">
								<a href="{{ url('application') }}" class="">
									<img alt="Triadhipa Logistics Logo" src="{{ asset('img/triadhipa-logo.webp') }}" style="max-width:200px;"/>
								</a>
							</div>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder text-gray-900 mb-5">Password berhasil diubah</h1>
							<!--end::Title-->
							<!--begin::Message-->
							<div class="fs-6 fw-semibold text-gray-500 mb-10">Sekarang anda bisa login dengan username
							<a href="#" class="link-primary fw-semibold">{{ $req['username'] }}</a>
							<br />dan password baru anda</div>
							<!--end::Message-->
							<!--begin::Link-->
							<div class="mb-11">
								<a href="{{ url('application') }}" class="btn btn-sm btn-primary">Sign in</a>
							</div>
							<!--end::Link-->
							<!--begin::Illustration-->
							<div class="mb-0">
								<img src="{{ asset("metronic/dist") }}/assets/media/auth/ok.png" class="mw-100 mh-300px theme-light-show" alt="" />
								<img src="{{ asset("metronic/dist") }}/assets/media/auth/ok-dark.png" class="mw-100 mh-300px theme-dark-show" alt="" />
							</div>
							<!--end::Illustration-->
						</div>
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Signup Welcome Message-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="{{ asset("metronic/dist") }}/assets/plugins/global/plugins.bundle.js"></script>
		<script src="{{ asset("metronic/dist") }}/assets/js/scripts.bundle.js"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>