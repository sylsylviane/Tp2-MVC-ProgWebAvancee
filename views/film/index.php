{{include('layouts/header.php', {title: 'Films'})}}

<h1>Table</h1>
<h2>Film</h2>
<table>
    <tr>
        <th>Titre</th>
        <th>Synopsis</th>
        <th>Date de sortie</th>
        <th>Durée</th>
        <th>Genre</th>
        <!-- <th>Réalisateur(s)</th>
        <th>Acteur(s)</th> -->
    </tr>
    {% for film in films %}
    <tr>
        <td><a href="{{base}}/film/show?id={{film.id}}">{{film.titre}}</a></td>
        <td>{{film.synopsis}}</td>
        <td>{{film.date_sortie}}</td>
        <td>{{film.duree}}</td>
        <td>
            {% for genre in genres %}
                {% if genre.id == film.Genre_id %}
                    {{genre.nom}}
                {% endif %}
            {% endfor %}
        </td>
    </tr>
    {% endfor %}
</table>
<br><br>
<a href="{{base}}/film/create" class="btn">New Film</a>

{{include('layouts/footer.php')}}
