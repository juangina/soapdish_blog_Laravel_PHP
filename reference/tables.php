
<!--Example Table - 3 Columns-->

<div class="container-fluid">
        <div class="row">
            <div class="col-sm-4"> 
                <table class="table table-bordered table-dark table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Base Butters - bb</td>
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
            <div class="col-sm-4">
                <table class="table table-bordered table-dark table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units (grams)</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Base Fats - bf</td>
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
        
            <div class="col-sm-4">
                <table class="table table-bordered table-dark table-striped">
                    <tr>
                        <th>Type</th>
                        <th>Ingredient</th>
                        <th>Units</th>
                    </tr>
                    <tr>
                        <td rowspan="3">Base Oils - bo</td>
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

