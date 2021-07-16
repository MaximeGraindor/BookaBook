<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 - HTML Pocket Reference
        Book::insert([
            'name' => 'HTML5 Pocket Reference',
            'slug' => 'html5-pocket-reference',
            'ISBN' => '9781449363352',
            'editing_details' => '',
            'cover_path' => 'HTML5PocketReference.jpg',
            'required' => 1,
            'publisher_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 2 - CSS Pocket Reference
        Book::insert([
            'name' => 'CSS Pocket Reference',
            "slug" => 'css-pocket-reference',
            'ISBN' => '9781492033394',
            'editing_details' => '',
            'cover_path' => 'CSSPocketReference.jpg',
            'required' => 1,
            'publisher_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 3 - Ergonomie Web et UX design
        Book::insert([
            'name' => 'Ergonomie web et UX Design',
            'slug' => 'ergonomie-web-et-ux-design',
            'ISBN' => '9782212132151',
            'editing_details' => '',
            'cover_path' => 'ergonomieWebEtUXDesign.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 4 - Choix typographiques
        Book::insert([
            'name' => 'Choix typographiques',
            'slug' => 'choix-typographique',
            'ISBN' => '9782960234510',
            'editing_details' => '',
            'cover_path' => 'choixTypographiques.jpg',
            'required' => 1,
            'publisher_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 5 - Communication et image
        Book::insert([
            'name' => 'Communication et image',
            'slug' => 'communication-et-image',
            'ISBN' => '9782960234503',
            'editing_details' => '',
            'cover_path' => 'communicationEtImage.jpg',
            'required' => 1,
            'publisher_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 6 - Lexique des règles typographiques
        Book::insert([
            'name' => 'Lexique des règles typographiques',
            'slug' => 'lexique-des-regles-typographiques',
            'ISBN' => '9782743304829',
            'editing_details' => '',
            'cover_path' => 'lexiqueDesreglesTypographiques.jpg',
            'required' => 1,
            'publisher_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 7 - Mise en page et impression : Notions élémentaires
        Book::insert([
            'name' => 'Mise en page et impression : Notions élémentaires',
            'slug' => 'mise-en-page-et-impression-notions-elementaires',
            'ISBN' => '9782911220012',
            'editing_details' => '',
            'cover_path' => 'miseEnPageEtImpression.jpg',
            'required' => 1,
            'publisher_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 8 - Culture graphique: Une perspective, de Gutenberg à nos jours
        Book::insert([
            'name' => 'Culture graphique: Une perspective, de Gutenberg à nos jours',
            'slug' => 'culture-graphique-une-perspective-de-gutenberg-a-nos-jours',
            'ISBN' => '9782350173177',
            'editing_details' => '',
            'cover_path' => 'cultureGraphique.jpg',
            'required' => 1,
            'publisher_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 10 - HTML5 Une référence pour le développeur web
        Book::insert([
            'name' => 'HTML5 Une référence pour le développeur web',
            'slug' => 'html5-une-reference-pour-le-developpeur-web',
            'ISBN' => '9782212143652',
            'editing_details' => '',
            'cover_path' => 'HTML5UneReferencePourLeDeveloppeurWeb.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 11 - CSS3 Flexbox
        Book::insert([
            'name' => 'CSS3 Flexbox',
            'slug' => 'css3-flexbox',
            'ISBN' => '9782212143638',
            'editing_details' => '',
            'cover_path' => 'CSS3Flexbox.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 12 - CSS3 Grid Layout
        Book::insert([
            'name' => 'CSS3 Grid Layout',
            'slug' => 'css3-grid-layout',
            'ISBN' => '9782212676839',
            'editing_details' => '',
            'cover_path' => 'CSS3GridLayout.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 13 - Responsive web design
        Book::insert([
            'name' => 'Responsive web design',
            'slug' => 'responsive-web-design',
            'ISBN' => '9782212673616',
            'editing_details' => '',
            'cover_path' => 'responsiveWebDesign.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 14 - Sass pour les web designers
        Book::insert([
            'name' => 'Sass pour les web designers',
            'slug' => 'sass-pour-les-web-designers',
            'ISBN' => '9782212141474',
            'editing_details' => '',
            'cover_path' => 'SassPourLesWebDesigners.jpg',
            'required' => 1,
            'publisher_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 15 - Guide pratique de choix typographique
        Book::insert([
            'name' => 'Guide pratique de choix typographique',
            'slug' => 'guide-pratique-de-choix-typographique',
            'ISBN' => '9782911220937',
            'editing_details' => '',
            'cover_path' => 'guidePratiqueDeChoixTypographique.jpg',
            'required' => 0,
            'publisher_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 16 - Règles de l’écriture typographique du français
        Book::insert([
            'name' => 'Règles de l’écriture typographique du français',
            'slug' => 'regles-de-l-ecriture-typographique-du-français',
            'ISBN' => '9782911220289',
            'editing_details' => '',
            'cover_path' => 'reglesEcritureTypographiqueDuFrancais.jpg',
            'required' => 0,
            'publisher_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        // 17 - Mise en page(s), etc. Fondamentaux, éléments de base, principes de grille, supports, études de cas
        Book::insert([
            'name' => 'Mise en page(s), etc. Fondamentaux, éléments de base, principes de grille, supports, études de cas',
            'slug' => 'mise-en-pages-etc',
            'ISBN' => '9782350171692',
            'editing_details' => '',
            'cover_path' => 'miseEnPageEct.jpg',
            'required' => 0,
            'publisher_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
