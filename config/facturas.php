<?php
/**
 * En este archivo pondremos los valores iniciales de los numero de control y de factura por aeropuerto
 *
 *  El primer indice sera 'nControl' y 'nFactura'
 *
 *  El segundo indice es el aeropuerto -> siglas !! es muy importante que esste no cambie
 *
 * El tercero sera el prefijo ya sea del ncontrol o nfactura en el caso que corresponda
 *
 */
return [

    "nControl" => [

        "PZO" => [

            "PZO" => 100,
            "D-PZO" => 1000000,

        ],

        "CBL" => [


        ],

        "SEU" => [


        ],

    ],

    "nFactura" => [

        "PZO" => [

            "PZO" => 2000,
            "D-PZO" => 2,

        ],

        "CBL" => [



        ],

        "SEU" => [



        ],

    ],

];