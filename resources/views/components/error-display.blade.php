    <!--=============================
        DISPLAY ANY ERROR START
    ==============================-->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        @php
         toastr()->error("$error")
        @endphp
        @endforeach
    @endif
    <!--=============================
       DISPLAY ANY ERROR END
    ==============================-->  