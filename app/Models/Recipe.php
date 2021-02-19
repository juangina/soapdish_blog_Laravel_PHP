<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    //Table Name
    protected $table = 'recipes';
    //Primary Key
    public $primaryKey = 'id';
    //Casting Data Type for Recipe
    protected $casts = [
        'bb_cocoa' => 'decimal:2',
        'bb_shea' => 'decimal:2',
        'bb_mango' => 'decimal:2',

        'bf_coconut' => 'decimal:2',
        'bf_palm' => 'decimal:2',
        'bf_lanolin' => 'decimal:2',
        
        'bo_olive' => 'decimal:2',
        'bo_advocado' => 'decimal:2',
        'bo_caster' => 'decimal:2',
        

        'eo_hemp_seed' => 'decimal:2',
        'eo_tea_tree' => 'decimal:2',
        'eo_honey' => 'decimal:2',
        
        'fo_lavendar' => 'decimal:2',
        'fo_lemongrass' => 'decimal:2',
        'fo_eucalyptus' => 'decimal:2',
        
        'cl_gold' => 'decimal:2',
        'cl_cappuccino' => 'decimal:2',
        'cl_lavendar' => 'decimal:2',


        'ex_oatmeal' => 'decimal:2',
        'ex_flaxseed' => 'decimal:2',
        'ex_seaweed' => 'decimal:2',
        
        'pr_grapeseed_extract' => 'decimal:2',
        'pr_carrot_root_oil' => 'decimal:2',
        'pr_tocopherols' => 'decimal:2',
        
        'sodium_hydroxide' => 'decimal:2',
        'potassium_hydroxide' => 'decimal:2',
        'sodium_lactate' => 'decimal:2',
        

        'distilled_water' => 'decimal:2',
        'buttermilk' => 'decimal:2',
        'coconut_milk' => 'decimal:2',
        
        'discount' => 'decimal:2',
        'temp_min' => 'decimal:2',
        'temp_max' => 'decimal:2',
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

class Formula extends Model
{
    use HasFactory;
    //Table Name
    protected $table = 'oils_sap';
    //Primary Key
    public $primaryKey = 'id';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}