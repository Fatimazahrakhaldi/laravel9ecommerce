 <!-- Javascript -->
 <!-- jquery is not required for the picker to work-->
 {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"
     integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A=="
     crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

 <script src="{{ asset('backend/plugins/popper.min.js') }}"></script>

 <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

 @stack('charts')

 <!-- Page Specific JS -->
 <script src="{{ asset('backend/js/app.js') }}"></script>

 <!-- FontAwesome JS-->
 <script defer src="{{ asset('backend/plugins/fontawesome/js/all.min.js') }}"></script>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

 <!-- Tempus Dominus JavaScript -->
 <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
     crossorigin="anonymous"></script>

 <script src="https://cdn.tiny.cloud/1/whx7bovybf6ngm2ppu3m5116csmklvu1ujuy3ouvnkabdbj4/tinymce/6/tinymce.min.js"
     referrerpolicy="origin"></script>
