<?php

// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Restaurantes',
            'Bares y Cafeterías',
            'Alojamientos (Hoteles, Hostales, Airbnb)',
            'Supermercados y Almacenes',
            'Fruterías y Verdulerías',
            'Carnicerías y Pescaderías',
            'Panaderías y Pastelerías',
            'Farmacias',
            'Tiendas de Ropa',
            'Ferreterías',
            'Tiendas de Electrónica',
            'Servicios de Turismo (Excursiones, Tours)',
            'Alquiler de Vehículos y Motos',
            'Servicios Náuticos',
            'Salones de Belleza y Barberías',
            'Gimnasios y Actividades Deportivas',
            'Actividades Acuáticas',
            'Consultorios Médicos',
            'Veterinarias y Petshops',
            'Oficinas Inmobiliarias',
            'Servicios de Construcción',
            'Librerías y Papelerías',
            'Lavanderías y Tintorerías',
            'Talleres Mecánicos',
            'Servicios de Transporte',
            'Estaciones de Servicio',
        ];

        foreach ($categories as $name) {
            Category::firstOrCreate(['name' => $name]);
        }
    }
}
