@extends('layouts.app')

@section('content')
    <h1>Design Recipe</h1>
    <p>
        Enter your recipe name, number of bars, percentage value for each oil, and discount.  The form will automatically calculate the weight for the oils, sodium hydroxide, and water.  Enjoy!
    </p>
    {!! Form::open(['action' => 'App\Http\Controllers\RecipesController@store', 'method' => 'POST']) !!}

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name', '', ['id' => 'name_form', 'class' => 'form-control', 'placeholder' => 'Name'])}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        {{Form::label('bars', 'Enter Number of Soap Bars')}}
                        {{Form::text('bars', '1', ['id' => 'bars_form', 'class' => 'form-control'])}}
                    </div>
                </div>
            </div>
        </div>
        <!--Recipe Table-->
        
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>Ingredient</th>
                        <th>Percentage</th>
                        <th>Amount (grams)</th>
                    </tr>
                    <td>Coconut Oil</td>
                    <td>{{Form::text('coconut_oil_percentage', '35', ['id'=>'coconut_oil_percentage', 'class'=>'oil_percentage'])}}</td>
                    <td>{{Form::text('coconut_oil_weight','', ['id'=>'coconut_oil_weight', 'class'=>'oil_weight', 'disabled'=>'disabled'])}}</td>
                    <tr>
                        <td>Palm Oil</td>
                        <td>{{Form::text('palm_oil_percentage','30', ['id'=>'palm_oil_percentage', 'class'=>'oil_percentage'])}}</td>
                        <td>{{Form::text('palm_oil_weight', '', ['id'=>'palm_oil_weight', 'class'=>'oil_weight', 'disabled'=>'disabled'])}}</td>
                    </tr>
                    <tr>
                        <td>Olive Oil</td>
                        <td>{{Form::text('olive_oil_percentage', '35', ['id'=>'olive_oil_percentage', 'class'=>'oil_percentage'])}}</td>
                        <td>{{Form::text('olive_oil_weight','', ['id'=>'olive_oil_weight', 'class'=>'oil_weight', 'disabled'=>'disabled'])}}</td>
                    </tr>
                    <tr>
                        <td>Castor Oil</td>
                        <td>{{Form::text('castor_oil_percentage', '0', ['id'=>'castor_oil_percentage', 'class'=>'oil_percentage'])}}</td>
                        <td>{{Form::text('castor_oil_weight', '', ['id'=>'castor_oil_weight', 'class'=>'oil_weight', 'disabled'=>'disabled'])}}</td>
                    </tr>
                        <td>Sum Total</td>
                        <td>{{Form::text('sum_total_percentage', '', ['id'=>'sum_total_percentage', 'disabled'=>'disabled'])}}</td>
                        <td>{{Form::text('sum_total_weight', '', ['id'=>'sum_total_weight', 'disabled'=>'disabled'])}}</td>
                </table>
                </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">    
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Discount</td>
                            <td>{{Form::text('discount', '10', ['id'=>'discount'])}}</td>
                        </tr>
                        <tr>
                            <th>Ingredient</th>
                            <th>Amount (grams)</th>
                        </tr>
                        <tr>
                            <td>Sodium Hydroxide</td>
                            <td>{{Form::text('sodium_hydroxide', '', ['id'=>'sodium_hydroxide', 'disabled'=>'disabled'])}}</td>
                        </tr>
                        <tr>
                            <td>Distilled Water</td>
                            <td>{{Form::text('distilled_water', '', ['id'=>'distilled_water', 'disabled'=>'disabled'])}}</td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>

    {!! Form::close() !!}
    <div style='height: 50px;'></div>

    @include('inc.jquery')
@endsection