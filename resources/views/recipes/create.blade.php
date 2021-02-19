@extends('layouts.app')

@section('content')
    <h1>Create Recipe</h1>

    {!! Form::open(['action' => 'App\Http\Controllers\RecipesController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description Text', 'id'=>'article-ckeditor'])}}
        </div>
        <div class="form-group">
            {{Form::label('special', 'Special Instructions')}}
            {{Form::textarea('special', '', ['class' => 'form-control', 'placeholder' => 'Special Instructions Text - Enter any additional ingredients not included in the base formula here.  Also include any special instructions for the process.', 'id'=>'article-ckeditor'])}}
        </div>

    <!--Recipe Table-->  
    <div class="container-fluid">    
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Discussion</td>
                        <td>Description</td>
                        <td>$recipe->description</td>
                    </tr>
                    <tr>
                    
                        <td>Special Instructions</td>
                        <td>$recipe->special_instructions</td>
                    </tr>
                    <tr>

                        <td>Discount Number</td>
                        <td>{{Form::text('discount')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col"> 
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Acid Butters - ab</td>
                        <td>Cocoa</td>
                        <td>{{Form::text('bb_cocoa')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Shea</td>
                        <td>{{Form::text('bb_shea')}}</td>
                    </tr>
                    <tr>

                        <td>Mango</td>
                        <td>{{Form::text('bb_shea')}}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Acid Fats - af</td>
                        <td>Coconut</td>
                        <td>{{Form::text('bf_coconut')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Palm</td>
                        <td>{{Form::text('bf_palm')}}</td>
                    </tr>
                    <tr>

                        <td>Lanolin</td>
                        <td>{{Form::text('bf_lanolin')}}</td>
                    </tr>
                </table>
            </div>
        
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Acid Oils - ao</td>
                        <td>Olive</td>
                        <td>{{Form::text('bo_olive')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Advocado</td>
                        <td>{{Form::text('bo_advocado')}}</td>
                    </tr>
                    <tr>

                        <td>Caster</td>
                        <td>{{Form::text('bo_caster')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">    
        <div class="row">
            <div class="col"> 
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Essential Oils - eo</td>
                        <td>Hemp Seed</td>
                        <td>{{Form::text('eo_hemp_seed')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Tea Tree</td>
                        <td>{{Form::text('eo_tea_tree')}}</td>
                    </tr>
                    <tr>

                        <td>Honey</td>
                        <td>{{Form::text('eo_honey')}}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Fragrance Oils - fo</td>
                        <td>Lavender</td>
                        <td>{{Form::text('fo_lavender')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Lemongrass</td>
                        <td>{{Form::text('fo_lemongrass')}}</td>
                    </tr>
                    <tr>

                        <td>Eucalyptus</td>
                        <td>{{Form::text('fo_eucalyptus')}}</td>
                    </tr>
                </table>
            </div>
        
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (tsp)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Colorants - cl</td>
                        <td>Gold</td>
                        <td>{{Form::text('cl_gold')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Cappuccino</td>
                        <td>{{Form::text('cl_cappuccino')}}</td>
                    </tr>
                    <tr>

                        <td>Lavender</td>
                        <td>{{Form::text('cl_lavendar')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col"> 
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Exfoliants - ex</td>
                        <td>Oatmeal</td>
                        <td>{{Form::text('ex_oatmeal')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Flaxseed</td>
                        <td>{{Form::text('ex_flaxseed')}}</td>
                    </tr>
                    <tr>

                        <td>Seaweed</td>
                        <td>{{Form::text('ex_seaweed')}}</td>
                    </tr>
                </table>
            </div>
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Preservative - pr</td>
                        <td>Grapefruit Seed Extract</td>
                        <td>{{Form::text('pr_grapeseed_extract')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Carrot Root Oil</td>
                        <td>{{Form::text('pr_carrot_root_oil')}}</td>
                    </tr>
                    <tr>

                        <td>Tocopherols</td>
                        <td>{{Form::text('pr_tocopherols')}}</td>
                    </tr>
                </table>
            </div>
        
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Bases</td>
                        <td>Sodium Hydroxide</td>
                        <td>{{Form::text('sodium_hydroxide')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Potassium Hydroxide</td>
                        <td>{{Form::text('potassium_hydroxide')}}</td>
                    </tr>
                    <tr>

                        <td>Sodium Lactate</td>
                        <td>{{Form::text('sodium_lactate')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col"> 
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Liquids</td>
                        <td>Distilled Water</td>
                        <td>{{Form::text('distilled_water')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Buttermilk</td>
                        <td>{{Form::text('buttermilk')}}</td>
                    </tr>
                    <tr>

                        <td>Coconut Milk</td>
                        <td>{{Form::text('coconut_milk')}}</td>
                    </tr>
                </table>
            </div>        
            <div class="col">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (Celcius)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Temperatures and Image Reference</td>
                        <td>Minimum Temperature</td>
                        <td>{{Form::text('temp_min')}}</td>
                    </tr>
                    <tr>
                    
                        <td>Maximum Temperature</td>
                        <td>{{Form::text('temp_max')}}</td>
                    </tr>
                    <tr>

                        <td>Image Reference</td>
                        <td>{{Form::text('image_id')}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    <div style='height: 100px;'></div>


@endsection