<?php 
/* 
Plugin Name: Custom WC Categories
Description: En Pruebas 
Version: a0.1
Author: Rubén Alvarado 
*/
/*
Tarjetas Personalizadas is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Tarjetas Personalizadas is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/
vc_map( array( 
    "name" => __("Custom Product Categories", 'rubAl-text-domain'),
    "show_settings_on_create" => true,
    "description" => "Crear tarjetas con contenido fácilmente", 
    "base" => "vc_wc_custom_categories_product", 
    "class" => "",
    "category" => "Rubén Alvarado", 
    "params" => array( 
        array(
            "type" => "param_group",
            "value" => "",
            "param_name" => "elementos",
            "params" => array(
                array(
                    "type" => "textfield",
                    "value" => "",
                    "heading" => __( "Título", "tu-text-domain" ),
                    "param_name" => "titulo"
                ),
                array(
                    "type" => "colorpicker",
                    "value" => "",
                    "heading" => __( "Color del texto", "tu-text-domain" ),
                    "param_name" => "color_del_texto"
                )
            )
        )
    ) 
 ) );

function render_categ_custom_rar($atts) { 
    // Extrae los atributos del shortcode
    extract( shortcode_atts( array(
        'elementos' => '',
    ), $atts ) );

    // Decodifica los elementos
    $elementos = vc_param_group_parse_atts( $elementos );

    // Inicia la salida
    $output = '<div style="display:flex;flex-wrap:wrap;justify-content:space-around;">';

    // Itera sobre cada elemento
    foreach ( $elementos as $elemento ) {
        // Añade cada elemento a la salida
        $output .= '<div class="vc_col-sm-6" style="padding:10px;width:33%;">
        <a href="https://google.es" target="_blank" style="display:flex;
        border-radius:10px;padding:30px;box-shadow:1px 1px 5px 0
        rgba(145,145,145,0.32)!important;align-items:center;">
        
        <img
        src="'.plugins_url('src/test_pic.png', __FILE__).'"
        style="display:inline; height:80px; width:auto;"/>
        
        <h4 style="display:inline;margin-left:20px;padding:0;">Nombre de la entrada</h4>
        
        </a>
        </div>';
    }

    // Finaliza la salida
    $output .= '</div>';

    // Devuelve la salida
    return $output;
}

add_shortcode('vc_wc_custom_categories_product', 'render_categ_custom_rar');
 
?>