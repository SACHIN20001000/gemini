
@if ($message = Session::get('success'))
<br>
<div class="container">
<div class="alert alert-solid-success" role="alert">
        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
           <span aria-hidden="true">&times;</span>
      </button>
       <strong>Well done!</strong> {{ $message }}
</div>
</div>
@endif

  

@if ($message = Session::get('error'))
<br>
<div class="container">
<div class="alert alert-solid-danger mg-b-0" role="alert">
        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oh snap!</strong> {{ $message }}
</div>
</div>

@endif

   

@if ($message = Session::get('warning'))
<br>
<div class="container">
<div class="alert alert-solid-warning" role="alert">
        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Warning!</strong> {{ $message }}
</div>
</div>
    

@endif

   

@if ($message = Session::get('info'))
<br>
<div class="container">
 <div class="alert alert-solid-info" role="alert">
        <button aria-label="Close" class="close" data-bs-dismiss="alert" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Heads up!</strong> {{ $message }}
    </div>
    </div>
@endif

  

@if ($errors->any())
<br>
<div class="container">
<div class="alert alert-solid-danger">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    Please check the form below for errors

</div>
</div>
@endif
