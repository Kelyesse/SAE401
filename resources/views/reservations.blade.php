@extends('layouts.layout')

@section('title', 'POLYMEDIA - Réservations')

@section('content')

<head>
    <link rel="stylesheet" href="./style/reservations.css">
    <script src="./js/getUserInfos.js"></script>
    <script src="./js/getReservations.js"></script>
</head>

<main class="container">
    <div class="title">
        <div class="page-title">Vos informations</div>
        <div class="title-underline"></div>
    </div>
    <section class="user-infos" x-data="userInfos">
        <div class="info-container">
            <img src="./storage/icone-compte-rouge.png" alt="" class="user-icon">
            <input type="text" class="info-nom" x-model="userInfos.nom" :readonly="!isEditing" :class="isEditing ? 'editing' : ''" />
            <input type="text" class="info-prenom" x-model="userInfos.prenom" :readonly="!isEditing" :class="isEditing ? 'editing' : ''" />
            <template x-if="!isEditing">
                <img src="./storage/icone-modifier.png" alt="" class="edit-icon" @click="editField('nom', 'prenom')" />
            </template>
            <template x-if="isEditing">
                <img src="./storage/clear-icon.png" alt="" class="cancel-icon" @click="cancelEditing" />
            </template>
        </div>
        <div class="info-container">
            <img src="./storage/icone-email.png" alt="" class="email-icon">
            <input type="email" class="info-email" id="info-email" x-model="userInfos.email" :readonly="!isEditing"
                :class="isEditing ? 'editing' : ''" />
            <template x-if="!isEditing">
                <img src="./storage/icone-modifier.png" alt="" class="edit-icon" @click="editField('email')" />
            </template>
            <template x-if="isEditing">
                <img src="./storage/clear-icon.png" alt="" class="cancel-icon" @click="cancelEditing" />
            </template>
        </div>
        <div class="info-container">
            <img src="./storage/icone-password.png" alt="" class="password-icon">
            <template x-if="!isEditing">
                <template x-for="i in 10" :key="i">
                    <div class="black-circle"></div>
                </template>
                <img src="./storage/icone-modifier.png" alt="" class="edit-icon" @click="editField('password')" />
            </template>
            <template x-if="isEditing">
                <input type="password" class="info-password" x-model="userInfos.password" :class="isEditing ? 'editing' : ''" />
                <img src="./storage/clear-icon.png" alt="" class="cancel-icon" @click="cancelEditing" />
            </template>
            <template x-if="!isEditing">
                <img src="./storage/icone-modifier.png" alt="" class="edit-icon" @click="editField('password')" />
            </template>
            <template x-if="isEditing">
                <img src="./storage/clear-icon.png" alt="" class="cancel-icon" @click="cancelEditing" />
            </template>
        </div>
        <div class="info-container">
            <img src="./storage/icone-lieu.png" alt="" class="lieu-icon">
            <input type="text" class="info-adresse" id="info-adresse" x-model="userInfos.adresse" :readonly="!isEditing"
                :class="isEditing ? 'editing' : ''" />
            <div class="inputs-lieu">
                <input type="text" class="info-code_postal" x-model="userInfos.code_postal" :readonly="!isEditing"
                    :class="isEditing ? 'editing' : ''" />
                <input type="text" class="info-ville" x-model="userInfos.ville" :readonly="!isEditing" :class="isEditing ? 'editing' : ''" />
            </div>
            <template x-if="!isEditing">
                <img src="./storage/icone-modifier.png" alt="" class="edit-icon"
                    @click="editField('adresse', 'code_postal', 'ville')" />
            </template>
            <template x-if="isEditing">
                <img src="./storage/clear-icon.png" alt="" class="cancel-icon" @click="cancelEditing" />
            </template>
        </div>
        <div class="action-buttons" x-show="isEditing">
            <div class="cancel-button" @click="cancelEditing">Annuler les changements</div>
            <button class="confirm-button" @click="saveChanges">Valider les changements</button>
        </div>
    </section>

    <section class="user-reservations" x-data="reservations">
        <div class="title">
            <div class="page-title">Vos réservations</div>
            <div class="title-underline"></div>
        </div>
        <div class="carousel">
            <div class="ressource-container">
                <template x-if="isResponseEmpty">
                    <div class="no-ressources-message">
                        Vous n'avez aucune réservation active...
                        <a href="/catalogue" class="explore-catalog-button">Explorez notre catalogue</a>
                    </div>
                </template>
                <template x-for="reservation in reservations">
                    <a :href="'./ressource?' + (reservation . ressource_details . isbn ? 'isbn=' + reservation . ressource_details . isbn : 'ian=' + reservation . ressource_details . ian) + '&id=' + reservation . ressource_details . id" class="ressource-item">
                        <img class="ressource-img" :src="'./storage/' + reservation . ressource_details . imgUrl"
                            alt="Image de la ressource">
                        <div class="ressource-title" x-text="reservation.ressource_details.titre"></div>
                        <div class="ressource-remaining" x-text="getRemainingTime(reservation.date_retour_prevue)">
                        </div>
                    </a>
                </template>
            </div>
        </div>
    </section>
</main>

@endsection