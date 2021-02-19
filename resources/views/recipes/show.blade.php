@extends('layouts.app')

@section('content')
    <a href="/recipes" class='btn btn-secondary m-2'>Go Back to Recipes</a>
    <h1>{{$recipe->name}}</h1>

    <hr>

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
                        <td>{{$recipe->description}}</td>
                    </tr>
                    <tr>
                    
                        <td>Special Instructions</td>
                        <td>{{$recipe->special_instructions}}</td>
                    </tr>
                    <tr>

                        <td>Discount Number</td>
                        <td>{{$recipe->discount}}</td>
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
                        <td>{{$recipe->bb_cocoa}}</td>
                    </tr>
                    <tr>
                    
                        <td>Shea</td>
                        <td>{{$recipe->bb_shea}}</td>
                    </tr>
                    <tr>

                        <td>Mango</td>
                        <td>{{$recipe->bb_mango}}</td>
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
                        <td>{{$recipe->bf_coconut}}</td>
                    </tr>
                    <tr>
                    
                        <td>Palm</td>
                        <td>{{$recipe->bf_palm}}</td>
                    </tr>
                    <tr>

                        <td>Lanolin</td>
                        <td>{{$recipe->bf_lanolin}}</td>
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
                        <td>{{$recipe->bo_olive}}</td>
                    </tr>
                    <tr>
                    
                        <td>Advocado</td>
                        <td>{{$recipe->bo_advocado}}</td>
                    </tr>
                    <tr>

                        <td>Caster</td>
                        <td>{{$recipe->bo_caster}}</td>
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
                        <td>{{$recipe->eo_hemp_seed}}</td>
                    </tr>
                    <tr>
                    
                        <td>Tea Tree</td>
                        <td>{{$recipe->eo_tea_tree}}</td>
                    </tr>
                    <tr>

                        <td>Honey</td>
                        <td>{{$recipe->eo_honey}}</td>
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
                        <td>{{$recipe->fo_lavender}}</td>
                    </tr>
                    <tr>
                    
                        <td>Lemongrass</td>
                        <td>{{$recipe->fo_lemongrass}}</td>
                    </tr>
                    <tr>

                        <td>Eucalyptus</td>
                        <td>{{$recipe->fo_eucalyptus}}</td>
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
                        <td>{{$recipe->cl_gold}}</td>
                    </tr>
                    <tr>
                    
                        <td>Cappuccino</td>
                        <td>{{$recipe->cl_cappuccino}}</td>
                    </tr>
                    <tr>

                        <td>Lavender</td>
                        <td>{{$recipe->cl_lavendar}}</td>
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
                        <td>{{$recipe->ex_oatmeal}}</td>
                    </tr>
                    <tr>
                    
                        <td>Flaxseed</td>
                        <td>{{$recipe->ex_flaxseed}}</td>
                    </tr>
                    <tr>

                        <td>Seaweed</td>
                        <td>{{$recipe->ex_seaweed}}</td>
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
                        <td>{{$recipe->pr_grapeseed_extract}}</td>
                    </tr>
                    <tr>
                    
                        <td>Carrot Root Oil</td>
                        <td>{{$recipe->pr_carrot_root_oil}}</td>
                    </tr>
                    <tr>

                        <td>Tocopherols</td>
                        <td>{{$recipe->pr_tocopherols}}</td>
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
                        <td>{{$recipe->sodium_hydroxide}}</td>
                    </tr>
                    <tr>
                    
                        <td>Potassium Hydroxide</td>
                        <td>{{$recipe->potassium_hydroxide}}</td>
                    </tr>
                    <tr>

                        <td>Sodium Lactate</td>
                        <td>{{$recipe->sodium_lactate}}</td>
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
                        <td>{{$recipe->distilled_water}}</td>
                    </tr>
                    <tr>
                    
                        <td>Buttermilk</td>
                        <td>{{$recipe->buttermilk}}</td>
                    </tr>
                    <tr>

                        <td>Coconut Milk</td>
                        <td>{{$recipe->coconut_milk}}</td>
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
                        <td>{{$recipe->temp_min}}</td>
                    </tr>
                    <tr>
                    
                        <td>Maximum Temperature</td>
                        <td>{{$recipe->temp_max}}</td>
                    </tr>
                    <tr>

                        <td>Image Reference</td>
                        <td>{{$recipe->image_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div style="height:1000px">
    </div>
@endsection