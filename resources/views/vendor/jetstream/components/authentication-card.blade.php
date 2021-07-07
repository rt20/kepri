<div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-green-100">
    <div>
        {{ $logo }}
         <!-- <a href="#" class="brand-link">
      <img src="{{ asset('img/logo_bantul.jpeg') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .9">
      <span class="brand-text font-weight-light">e-Office</span>
    </a> -->
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
