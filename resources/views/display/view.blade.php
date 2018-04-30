@if ($dept == '' AND $line == '')
    @include('display.index')
@else
    @include('display.perline')
@endif
