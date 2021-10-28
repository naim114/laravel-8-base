@if (isset($successmsg))
    <div class="alert alert-success" role="alert">
        {{ $successmsg }}
    </div>
@endif

@if (isset($errormsg))
    <div class="alert alert-danger" role="alert">
        {{ $errormsg }}
    </div>
@endif

@if (isset($warningmsg))
    <div class="alert alert-warning" role="alert">
        {{ $warningmsg }}
    </div>
@endif
