@extends('layouts.layout')
@section('content')

<script src="{{asset('css/process_steps.css')}}"></script>
<script src="{{asset('js/process_steps.js')}}"></script>

 <div class="row">

  <div class="process">
  <!--  <div class="process-row nav nav-tabs"> -->

    <div class="process-step">
     <button type="button" class="btn btn-info btn-circle" data-toggle="tab" href="#menu1"><i class="fa fa-info fa-3x"></i></button>
     <p><small>Fill<br />information</small></p>
    </div>

    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu2"><i class="fa fa-file-text-o fa-3x"></i></button>
     <p><small>Fill<br />description</small></p>
    </div>

    <!-- <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu3"><i class="fa fa-image fa-3x"></i></button>
     <p><small>Upload<br />images</small></p>
    </div>

    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu4"><i class="fa fa-cogs fa-3x"></i></button>
     <p><small>Configure<br />display</small></p>
    </div>

    <div class="process-step">
     <button type="button" class="btn btn-default btn-circle" data-toggle="tab" href="#menu5"><i class="fa fa-check fa-3x"></i></button>
     <p><small>Save<br />result</small></p>
    </div> -->

   <!-- </div> -->
  </div>

  <div class="tab-content">

   <div id="menu1" class="col-md-2 fade active in">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
    <!--<ul class="list-unstyled list-inline pull-right">
      <li> -->
        <button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button>
    <!-- </li> 
     </ul> -->
   </div>

   <div id="menu2" class="col-md-2 fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
<!--     <ul class="list-unstyled list-inline pull-right">
       <li> -->
        <button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
      <!-- <li>  -->
        <button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button>
        <!--</li>
    </ul> -->
   </div>

   <!-- <div id="menu3" class="tab-pane fade">
    <h3>Menu 3</h3>
    <p>Some content in menu 3.</p>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
    </ul>
   </div>

   <div id="menu4" class="tab-pane fade">
    <h3>Menu 4</h3>
    <p>Some content in menu 4.</p>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="button" class="btn btn-info next-step">Next <i class="fa fa-chevron-right"></i></button></li>
    </ul>
   </div>

   <div id="menu5" class="tab-pane fade">
    <h3>Menu 5</h3>
    <p>Some content in menu 5.</p>
    <ul class="list-unstyled list-inline pull-right">
     <li><button type="button" class="btn btn-default prev-step"><i class="fa fa-chevron-left"></i> Back</button></li>
     <li><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Done!</button></li>
    </ul>
   </div> -->

  </div>

 </div>

@endsection



@section('js_section')


