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
            "type" => "dropdown",
            "holder" => "div",
            "class" => "",
            "heading" => __("Columnas", "mi-text-domain"),
            "param_name" => "columns",
            "value" => array(
               '1 columna' => '100%',
               '2 columnas' => '50%',
               '3 Columnas' => '33%',
               '4 columna' => '25%',
               '5 columnas' => '20%',
               '6 Columnas' => '16%',
               '7 columna' => '14%',
               '8 columnas' => '12%',
               '9 Columnas' => '11%',
               '10 columna' => '10%',
               '11 columnas' => '9%',
               '12 Columnas' => '8%'
            ),
            "description" => __("Selecciona en cuántas columnas se van a distribuir las categorías.", "mi-text-domain")
        ),
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => __("Ancho mínimo", "mi-text-domain"),
            "param_name" => "ancho-minimo",
            "value" => '',
            "description" => __("Intrtoduzca el ancho mínimo incluyendo la medida. (Ej. 23px, 12rem, 13em...)", "mi-text-domain")
        ),
         array(
            "type" => "textarea_html",
            "holder" => "div",
            "class" => "",
            "heading" => __("Plantilla para las tarjetas", "mi-text-domain"),
            "param_name" => "plantilla-html",
            "value" => '',
            "description" => __("Escriba en html la forma en que se mostrarán los datos, puede incluir <b>[category]</b> para mostrar el nombre de la categoría, <b>[link]</b> para definir el enlace a la categoría, <b>[image]</b> para mostrar la miniatura de la categoría y <b>[quantity]</b> para mostrar la cantidad de elementos de la categoría,.", "mi-text-domain")
         ),
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
    
    $parametros = shortcode_atts( 
        array( 
            'columns' => '100%', 
            'ancho-minimo' => '', 
            'plantilla-html' => 'sssss'
        ), $atts 
    );
    
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

        
        $plantilla = $parametros['plantilla-html'];
        $plantilla = str_replace("-hola-", esc_html($elemento['titulo']), $plantilla);

        // Añade cada elemento a la salida

        $output .= '<div style="padding:10px;width:'.esc_html($parametros['columns']).';">';

        $output .= $plantilla;

        $output .= '</div>';
    }

    // Finaliza la salida
    $output .= '</div>';

    // Devuelve la salida
    return $output;
}

add_shortcode('vc_wc_custom_categories_product', 'render_categ_custom_rar');
 
?>