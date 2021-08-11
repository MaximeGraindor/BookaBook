@extends('layouts.main')
@section('title', 'Ajouter un livre')

@section('content')
    <section class="createBook max-width">
        <h2 class="createBook-title">
            Ajouter un livre
        </h2>
        <div class="createBook-wrapper">
            <div class="createBook-preview-wrapper">
                <img src="#" alt="">
                <span>
                    Prévisualisation De la photo de couverture
                </span>
            </div>
            <form action="/books/store" method="POST" class="createBook-form">
                @csrf
                <div class="createBook-form-cover">
                    <label for="cover">Photo de couverture</label>
                    <input type="file" id="cover" name="cover">
                </div>
                <div class="createBook-form-title">
                    <label for="title">Titre du livre</label>
                    <input type="text" id="title" name="title">
                </div>
                <div class="createBook-form-isbn">
                    <label for="isbn">ISBN</label>
                    <input type="text" id="isbn" name="isbn">
                </div>
                <div class="createBook-form-publicPrice">
                    <label for="publicPrice">Prix publique</label>
                    <input type="text" id="publicPrice" name="publicPrice">
                </div>
                <div class="createBook-form-studentPrice">
                    <label for="studentPrice">Prix étudiant</label>
                    <input type="text" id="studentPrice" name="studentPrice">
                </div>
                <div class="createBook-form-author">
                    <label for="author">author</label>
                    <select name="author" id="author">
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                    </select>
                </div>
                <div class="createBook-form-publisher">
                    <label for="publisher">Éditeur</label>
                    <select name="publisher" id="publisher">
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                        <option value="">test test test</option>
                    </select>
                </div>
                <div class="createBook-form-required">
                    <span>Obligatoire ?</span>
                    <div class="required-wrapper">
                        <label for="yes">
                            <input type="radio" name="required" id="yes">
                            Oui
                        </label>
                        <label for="no">
                            <input type="radio" name="required" id="no">
                            Non
                        </label>
                    </div>
                </div>
                <div class="createBook-form-publishingDetails">
                    <label for="publishingDetails">Détails d'édition</label>
                    <textarea name="publishingDetails" id="publishingDetails" cols="30" rows="10"></textarea>
                </div>
                <div class="createBook-form-submit">
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </div>
    </section>
@endsection
