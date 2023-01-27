@include('layouts.header')

<div style="margin: 10px;">
    @if(session('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{session('success')}}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                    </div>
                                                    @endif
                                                    @if(session('error'))
                                                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    <div>
                                                    {{session('error')}}
                                                    </div>
                                                    </div>
                                                    @endif
        @yield('content')
    </div>

@include('layouts.footer')
