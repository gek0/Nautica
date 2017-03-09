@include('public.layout.header')

    <div class="wind-container">
        <div class="row">
            <div class="col-sm-12 img-block">
                <img src="{{ asset('css/assets/images/nautica_bg_main.png') }}">
            </div>
        </div>
        <div class="row">
            <table class="wind">
                <tr>
                    <td colspan="3" class="n">
                        <a href="{{ url('info') }}" title="Tours - Info">
                            <button class="btn btn-wind"> N <i class="fa fa-angle-double-up" aria-hidden="true"></i> </button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="w">
                        <a href="{{ url('o-nama') }}" title="About us">
                            <button class="btn btn-wind"><i class="fa fa-angle-double-left" aria-hidden="true"></i> W </button>
                        </a>
                    </td>
                    <td width="20%"></td>
                    <td class="e">
                        <a href="{{ url('galerija') }}" title="Gallery">
                            <button class="btn btn-wind"> E <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" class="s">
                        <a href="{{ url('kontakt') }}" title="Contact">
                            <button class="btn btn-wind"><i class="fa fa-angle-double-down" aria-hidden="true"></i>  S </button>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>

@include('public.layout.footer')