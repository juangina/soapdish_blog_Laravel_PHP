<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Recipe;
use DB;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - READ ITEMS//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function index()
    {
        //$posts = Post::all();
        //return Post::where('title', 'Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title','desc')->take(1)->get();
        //$posts = Post::orderBy('title','desc')->get();

        $recipes = Recipe::orderBy('name','asc')->paginate(4);
        return view('recipes.index')->with('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - CREATE EDITOR//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - CREATE STORE//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            //'cover_image' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
		
	        // make thumbnails
	        $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);
		
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Recipe
        $recipe = new Recipe;
        //Information Table
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->special_instructions = $request->input('special_instructions');
        //Acid Butters Table
        $recipe->bb_cocoa = $request->input('bb_cocoa');
        $recipe->bb_shea = $request->input('bb_shea');
        $recipe->bb_mango = $request->input('bb_mango');
        //Acid Fats Table
        $recipe->bf_coconut = $request->input('bf_coconut');
        $recipe->bf_palm = $request->input('bf_palm');
        $recipe->bf_lanolin = $request->input('bf_lanolin');
        //Acid Oils Table
        $recipe->bo_olive = $request->input('bo_olive');
        $recipe->bo_advocado = $request->input('bo_advocado');
        $recipe->bo_caster = $request->input('bo_caster');
        //Essential Oils Table
        $recipe->eo_hemp_seed = $request->input('eo_hemp_seed');
        $recipe->eo_tea_tree = $request->input('eo_tea_tree');
        $recipe->eo_honey = $request->input('eo_honey');
        //Fragrance Oils Table
        $recipe->fo_lavendar = $request->input('fo_lavendar');
        $recipe->fo_lemongrass = $request->input('fo_lemongrass');
        $recipe->fo_eucalyptus = $request->input('fo_eucalyptus');
        //Colours Table
        $recipe->cl_gold = $request->input('cl_gold');
        $recipe->cl_cappuccino = $request->input('cl_cappuccino');
        $recipe->cl_lavendar = $request->input('cl_lavendar');
        //Exfoliants Table
        $recipe->ex_oatmeal = $request->input('ex_oatmeal');
        $recipe->ex_flaxseed = $request->input('ex_flaxseed');
        $recipe->ex_seaweed = $request->input('ex_seaweed');
        //Preservatives Table
        $recipe->pr_grapeseed_extract = $request->input('pr_grapeseed_extract');
        $recipe->pr_carrot_root_oil = $request->input('pr_carrot_root_oil');
        $recipe->pr_tocopherols = $request->input('pr_tocopherols');
        //Bases Table
        $recipe->sodium_hydroxide = $request->input('sodium_hydroxide');
        $recipe->potassium_hydroxide = $request->input('potassium_hydroxide');
        $recipe->sodium_lactate = $request->input('sodium_lactate');
        //Liquids Table
        $recipe->distilled_water = $request->input('distilled_water');
        $recipe->buttermilk = $request->input('buttermilk');
        $recipe->coconut_milk = $request->input('coconut_milk');
        //Measurements Table
        $recipe->temp_min = $request->input('temp_min');
        $recipe->temp_max = $request->input('temp_max');
        $recipe->discount = $request->input('discount');
        $recipe->image_id = $request->input('image_id');
        
        //Save User Id
        $recipe->user_id = auth()->user()->id;
        //$recipe->cover_image = $fileNameToStore;
        $recipe->save();

        //return redirect('/recipes')->with('success', 'Recipe Created');
        return redirect('/dashboard')->with('success', 'Recipe Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - READ ITEM//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function show($id)
    {
        $obj_recipe = Recipe::find($id);
        //extracting the array from the recipe object returned from database
        $json_recipe = json_encode($obj_recipe);
        $arr_recipe = (array)json_decode($json_recipe);


        $recipe = array(
            'recipe' => $obj_recipe,
            'recipe_item' => $arr_recipe
        );
        return view('recipes.show')->with($recipe);
        //return $recipe;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - UPDATE EDITOR//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        
        //Check if post exists before deleting
        if (!isset($recipe)){
            return redirect('/recipes')->with('error', 'No Recipe Found');
        }
        //value returned from postgres database is a string reprentation of the user_id
        //The auth() function represents the user id as an integer.
        //This has to converted to string to make the comparison work
        //$str_id = strval(auth()->user()->id);
        //var_dump($str_id);
        //$_userid = $recipe->user_id;
        //var_dump($_userid);

        // Check for correct user
        //if($str_id !== $_userid){
        if(auth()->user()->id !== $recipe->user_id){
            //return redirect('/posts')->with('error', 'Unauthorized Page:'.' id: '.$_id.' userid '.$_userid);
            return redirect('/recipes')->with('error', 'Unauthorized Page');
        }

        return view('recipes.edit')->with('recipe', $recipe);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - UPDATE STORE//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);
		$recipe = Recipe::find($id);

         //Handle File Upload
        if($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            // Delete file if exists
            Storage::delete('public/cover_images/'.$post->cover_image);
		
            //Make thumbnails
            $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(80, 80);
            $thumb->save('storage/cover_images/'.$thumbStore);
        }

        // Update Recipe
        //Information Table
        $recipe->name = $request->input('name');
        $recipe->description = $request->input('description');
        $recipe->special_instructions = $request->input('special_instructions');
        //Acid Butters Table
        $recipe->bb_cocoa = $request->input('bb_cocoa');
        $recipe->bb_shea = $request->input('bb_shea');
        $recipe->bb_mango = $request->input('bb_mango');
        //Acid Fats Table
        $recipe->bf_coconut = $request->input('bf_coconut');
        $recipe->bf_palm = $request->input('bf_palm');
        $recipe->bf_lanolin = $request->input('bf_lanolin');
        //Acid Oils Table
        $recipe->bo_olive = $request->input('bo_olive');
        $recipe->bo_advocado = $request->input('bo_advocado');
        $recipe->bo_caster = $request->input('bo_caster');
        //Essential Oils Table
        $recipe->eo_hemp_seed = $request->input('eo_hemp_seed');
        $recipe->eo_tea_tree = $request->input('eo_tea_tree');
        $recipe->eo_honey = $request->input('eo_honey');
        //Fragrance Oils Table
        $recipe->fo_lavendar = $request->input('fo_lavendar');
        $recipe->fo_lemongrass = $request->input('fo_lemongrass');
        $recipe->fo_eucalyptus = $request->input('fo_eucalyptus');
        //Colours Table
        $recipe->cl_gold = $request->input('cl_gold');
        $recipe->cl_cappuccino = $request->input('cl_cappuccino');
        $recipe->cl_lavendar = $request->input('cl_lavendar');
        //Exfoliants Table
        $recipe->ex_oatmeal = $request->input('ex_oatmeal');
        $recipe->ex_flaxseed = $request->input('ex_flaxseed');
        $recipe->ex_seaweed = $request->input('ex_seaweed');
        //Preservatives Table
        $recipe->pr_grapeseed_extract = $request->input('pr_grapeseed_extract');
        $recipe->pr_carrot_root_oil = $request->input('pr_carrot_root_oil');
        $recipe->pr_tocopherols = $request->input('pr_tocopherols');
        //Bases Table
        $recipe->sodium_hydroxide = $request->input('sodium_hydroxide');
        $recipe->potassium_hydroxide = $request->input('potassium_hydroxide');
        $recipe->sodium_lactate = $request->input('sodium_lactate');
        //Liquids Table
        $recipe->distilled_water = $request->input('distilled_water');
        $recipe->buttermilk = $request->input('buttermilk');
        $recipe->coconut_milk = $request->input('coconut_milk');
        //Measurements Table
        $recipe->temp_min = $request->input('temp_min');
        $recipe->temp_max = $request->input('temp_max');
        $recipe->discount = $request->input('discount');
        //$recipe->discount = '19.45';
        $recipe->image_id = $request->input('image_id');
        
        //Save User Id
        $recipe->user_id = auth()->user()->id;
        //$recipe->cover_image = $fileNameToStore;
        $recipe->save();

        //return redirect('/recipes')->with('success', 'Recipe Updated');
        return redirect('/dashboard')->with('success', 'Recipe Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //CRUD - DELETE ITEM//////////////////////////////////////////////////////////////////////////////////
     /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        
        //Check if post exists before deleting
        if (!isset($recipe)){
            return redirect('/recipes')->with('error', 'No Post Found');
        }

        //Check for correct user
        if(auth()->user()->id !==$recipe->user_id){
            return redirect('/recipes')->with('error', 'Unauthorized Page');
        }

        if($recipe->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$recipes->cover_image);
        }
        
        $recipe->delete();
        return redirect('/recipes')->with('success', 'Recipe Removed');
    }
    public function design()
    {
        return view('recipes.design');
    }
}
