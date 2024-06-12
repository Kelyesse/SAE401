@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <p>Gestions des utilisateurs !</p>

    <h2>Utilisateurs</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Type d'utilisateur</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($utilisateurs as $utilisateur)
            <tr>
                <td>{{ $utilisateur->id }}</td>
                <td>{{ $utilisateur->prenom }}</td>
                <td>{{ $utilisateur->nom }}</td>
                <td>{{ $utilisateur->email }}</td>
                <td>{{ $utilisateur->type_utilisateur }}</td>
                <td class="actions">
                    <!-- Bouton pour ouvrir le modal d'édition -->
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#editUserModal{{ $utilisateur->id }}">
                        Éditer
                    </button>

                    <!-- Formulaire pour la suppression -->
                    <form action="{{ route('admin.delete', $utilisateur->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>

            <!-- Modal d'édition -->
            <div class="modal fade" id="editUserModal{{ $utilisateur->id }}" tabindex="-1" role="dialog"
                aria-labelledby="editUserModalLabel{{ $utilisateur->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editUserModalLabel{{ $utilisateur->id }}">Éditer l'utilisateur
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin.update', $utilisateur->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="prenom{{ $utilisateur->id }}">Prénom</label>
                                    <input type="text" class="form-control" id="prenom{{ $utilisateur->id }}"
                                        name="prenom" value="{{ $utilisateur->prenom }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="nom{{ $utilisateur->id }}">Nom</label>
                                    <input type="text" class="form-control" id="nom{{ $utilisateur->id }}" name="nom"
                                        value="{{ $utilisateur->nom }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email{{ $utilisateur->id }}">Email</label>
                                    <input type="email" class="form-control" id="email{{ $utilisateur->id }}"
                                        name="email" value="{{ $utilisateur->email }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="type_utilisateur{{ $utilisateur->id }}">Type d'utilisateur</label>
                                    <select class="form-control" id="type_utilisateur{{ $utilisateur->id }}"
                                        name="type_utilisateur" required>
                                        <option value="utilisateur"
                                            {{ $utilisateur->type_utilisateur == 'utilisateur' ? 'selected' : '' }}>
                                            Utilisateur</option>
                                        <option value="bibliothecaire"
                                            {{ $utilisateur->type_utilisateur == 'bibliothecaire' ? 'selected' : '' }}>
                                            Bibliothécaire</option>
                                        <option value="admin"
                                            {{ $utilisateur->type_utilisateur == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection