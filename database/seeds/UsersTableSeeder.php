<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nomi = ["Enrico Bartolini al Mudec", "Uliassi", "Da Vittorio", "Piazza Duomo", "St. Hubertus Rosa Alpina", "Dal Pescatore", "Le Calandre", "Osteria Francescana", "Enoteca Pinchiorri", "Reale","La Pergola"];

        $url = ["https://www.dissapore.com/wp-content/uploads/2019/11/1508320722349.jpg", "https://i2.res.24o.it/images2010/Editrice/ILSOLE24ORE/ILSOLE24ORE/2020/05/08/Food24/ImmaginiWeb/Ritagli/ristorante_uliassi-kkgC--1020x533@IlSole24Ore-Web.jpg", "https://www.ristorantevittorio.it/wp-content/uploads/2016/05/ristorante_da_vittorio_porto_palo_43.jpg", "https://static.winenews.it/2019/02/RistorantePiazzaDuomoCrippaCerettoAlba.jpg", "https://www.rosalpina.it/images/slide/ristorante-hubertus/rosa-alpina-st-hubertus-03.jpg", "https://media-cdn.tripadvisor.com/media/photo-s/14/57/32/bf/dal-pescatore.jpg", "https://www.bernardello.it/images/epadova/le-calandre.jpg", "https://www.theworlds50best.com/discovery/filestore/jpg/OsteriaFrancescana-Modena-Italy-02.jpg", "https://www.firenzemadeintuscany.com/resources/places/Restaurant/Enoteca%20Pinchiorri/Enoteca%20Pinchiorri_1.jpg?w=1200&h=1200&fit=fill&f=faces", "https://www.nikoromito.com/wp-content/uploads/2021/05/ANZ_8782_nl.jpg","https://b.zmtcdn.com/data/pictures/0/16549140/21f97769ee696bfd8890f4613e19cd0d.jpg"];

        for ($i = 0; $i < 10; $i++) {
            $newUser = new User();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make("ristorante" . $i);
            $newUser->nome = $nomi[$i];
            $newUser->indirizzo = $faker->address();
            $newUser->P_IVA = $faker->numerify('IT###########');
            $newUser->immagine = $url[$i];
            $newUser->save();
        }
    }
}
