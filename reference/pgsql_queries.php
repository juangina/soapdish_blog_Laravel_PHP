Create Table recipes
(
    id serial primary key, name varchar, 
    bb_cocoa numeric(5,2), bb_shea numeric(5,2), bb_mango numeric(5,2), 
    bf_coconut numeric(5,2), bf_palm numeric(5,2), bf_lanolin numeric(5,2), 
    bo_olive numeric(5,2), bo_advocado numeric(5,2), bo_caster numeric(5,2), 

    eo_hemp_seed numeric(5,2), eo_tea_tree numeric(5,2), eo_honey numeric(5,2), 
    fo_lavendar numeric(5,2), fo_lemongrass numeric(5,2), fo_eucalyptus numeric(5,2), 
    cl_gold numeric(5,2), cl_cappuccino numeric(5,2), cl_lavendar numeric(5,2), 

    ex_oatmeal numeric(5,2), ex_flaxseed numeric(5,2), ex_seaweed numeric(5,2), 
    pr_grapeseed_extract numeric(5,2), pr_carrot_root_oil numeric(5,2), pr_tocopherols numeric(5,2), 
    sodium_hydroxide numeric(5,2), potassium_hydroxide numeric(5,2), sodium_lactate numeric(5,2), 

    distilled_water numeric(5,2), buttermilk numeric(5,2), coconut_milk numeric(5,2), 
    description text, special_instructions text, 
    discount numeric(2,0),
    temp_min numeric(3,0), temp_max numeric(3,0), 
    image_id text []
)