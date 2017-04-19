@extends('layouts.layout')
@section('content')

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


<div class="page-header">
    <h1 style="margin-left:-800px; margin-bottom:-20px;">Steps Circular Progress </h1>
    <img src="images/cart/cart list.png" class="cart_list" alt="" />
</div>

<small style="color:black;">A Bootstrap wizard template comprised of several steps, a circular progress indicator and an additional info panel.</small>

<!-- Steps Circular Progress - START --> 
    <div class="row" style="margin-right:5px; margin-left:5px">
        <div class="row step">
            <div id="div1" class="col-md-2" onclick="javascript: resetActive(event, 0, 'step-1');">
                <span class="fa fa-cloud-download"></span>
                <p>Download Application</p>
            </div>
            <div class="col-md-2 activestep" onclick="javascript: resetActive(event, 20, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p>Fill out</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 40, 'step-3');">
                <span class="fa fa-refresh"></span>
                <p>Check</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 60, 'step-4');">
                <span class="fa fa-dollar"></span>
                <p>Pay Fee</p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-5');">
                <span class="fa fa-cloud-upload"></span>
                <p>Submit Application</p>
            </div>
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-6');">
                <span class="fa fa-star"></span>
                <p>Send Feedback</p>
            </div>
        </div>

    <div class="col-xs-12 col-md-12 col-lg-12">
        
        <div class="col-xs-4 col-md-3 col-lg-3 step">
            <div id="progress" class="col-xs-12 col-md-4 col-lg-4" style="width: 190px; height: 190px;">
            </div>
        </div>

        <div class="col-xs-12 col-md-9 col-lg-9">
            <div class="row setup-content step hiddenStepInfo" id="step-1">
                <div class="col-xs-12">
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 1</h1>
                        <h3 class="underline">Instructions</h3>
                        Download the application form from our repository.
                This may require logging in.
                    </div>
                </div>
            </div>
            <div class="row setup-content step activeStepInfo" id="step-2">
                <div>
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 2</h1>
                        <h3 class="underline">Instructions</h3>
                        Fill out the application. 
                Make sure to leave no empty fields. 
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-3">
                <div>
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 3</h1>
                        <h3 class="underline">Instructions</h3>
                        Check to ensure that all data entered is valid. 
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-4">
                <div>
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 4</h1>
                        <h3 class="underline">Instructions</h3>
                        Pay the application fee. 
                This can be done either by entering your card details, or by using Paypal.
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-5">
                <div>
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 5</h1>
                        <h3 class="underline">Instructions</h3>
                        Upload the application. 
                This may require a confirmation email.
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-6">
                <div>
                    <div class="well text-center" style="width:1050px; margin-left:-85px">
                        <h1>STEP 6</h1>
                        <h3 class="underline">Instructions</h3>
                        Send us feedback on the overall process. 
                This step is not obligatory.
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

<style>
.hiddenStepInfo {
    display: none;
}

.activeStepInfo {
    display: block !important;
}

.underline {
    text-decoration: underline;
}

.step {
    margin-top: 27px;
    text-align: center;
}    

.step .col-md-2 {
    background-color: #fff;
    border: 1px solid #C0C0C0;
    border-right: none;
}

.step .col-md-2:last-child {
    border: 1px solid #C0C0C0;
}

.step .col-md-2:first-child {
    border-radius: 5px 0 0 5px;
}

.step .col-md-2:last-child {
    border-radius: 0 5px 5px 0;
}

.step .col-md-2:hover {
    color: #F58723;
    cursor: pointer;
}

.step .activestep {
    color: #F58723;
    height: 100px;
    margin-top: -7px;
    padding-top: 7px;
    border-left: 6px solid #5CB85C !important;
    border-right: 6px solid #5CB85C !important;
    border-top: 3px solid #5CB85C !important;
    border-bottom: 3px solid #5CB85C !important;
    vertical-align: central;
}

.step .fa {
    padding-top: 15px;
    font-size: 40px;
}
</style>



@endsection



@section('js_section')



