<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'nombre_producto' => $faker->randomElement(['camisa manga larga', 'pantalón de chándal', 'bañador con estampado', 'vaquero pitillo', 'sudadera con gorro', 'pantalón camuflaje', 'sudadera deportiva', 'bañador de lunares', 'sujetador con aros', 'camiseta de tirantes', 'vestido con estampado', 'bata de franela']),
        'descripcion' => $faker->text,
        'precio' => $faker->randomFloat(2, 0, 999),
        'marca' => $faker->randomElement(['nike', 'adidas', 'puma', 'palomo spain', 'primark', 'puf']),
        'temporada' => $faker->randomElement(['primavera', 'verano', 'otoño', 'invierno']),
        'target' => $faker->randomElement(['hombre', 'mujer', 'unisex-ad', 'niño', 'niña', 'unisex-ni']),
        'material' => $faker->randomElement(['algodón', 'franela', 'sintético', 'cuero', 'lana', 'poliéster']),
        'categoria' => $faker->randomElement(['camisetas', 'camisas', 'jerséis', 'sudaderas', 'pantalon', 'vaqueros', 'abrigos', 'chaquetas','zapatos']),
        'foto_producto' => $faker->randomElement(['images/carousel-1.jpg', 'images/carousel-2.jpg' ,'images/carousel-3.jpg']),
    ];
});
