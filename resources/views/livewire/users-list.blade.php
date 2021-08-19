<div class="students max-width">
    <div class="students-top">
        <h2 class="students-title">
            Liste des étudiants
        </h2>
        <form action="#" method="get" class="students-form-filter">
            <div class="students-filter-search">
                <label for="search">Groupe</label>
                <select name="group" id="group" wire:model="group">
                    <option value="">Tous</option>
                    @foreach ($usersGroup as $group)
                        @if($group != 0)
                            <option value="{{$group}}">{{$group}}</option>
                        @endif
                    @endforeach
                </select>
                <noscript>
                    <button type="submit">Filtrer</button>
                </noscript>
            </div>
        </form>
    </div>

    <div class="students-wrapper">
        <table>
            <thead>
                <th>Nom Prénom</th>
                <th>Groupe</th>
                <th>Email</th>
                <th>Status</th>
                <th>Date de vérification</th>
                <th>Mise à jour</th>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            <a href="profil/{{$user->slug}}">{{$user->name}} {{$user->firstname}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$user->slug}}">{{$user->group}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$user->slug}}">{{$user->email}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$user->slug}}"><span class="{{$user->enabled ? 'student-actif' : 'student-inactif'}}">{{$user->enabled ? 'actif' : 'inactif'}}</span></a>
                        </td>
                        <td>
                            <a href="profil/{{$user->slug}}">{{$user->email_verified_at}}</a>
                        </td>
                        <td>
                            <a href="profil/{{$user->slug}}">{{$user->updated_at}}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
