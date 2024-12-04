{{ include('layouts/header.php', {title: 'Dashboard'}) }}

<h1>Tableau de bord</h1>

<section class="stats">
    <header>
        <h2>Statistiques</h2>
    </header>
    <div>
        <article class="widget">
            <h2>Nombre Total D'utilisateurs</h2>
            <p>{{ data.totalUsers }}</p>
        </article>
        <article class="widget">
            <h2>Sessions Active</h2>
            <p>{{ data.activeSessions }}</p>
        </article>

        <article class="widget">
            <h2>Nouveaux Messages</h2>
            <p>{{ data.newMessages }}</p>
        </article>

        <article class="widget">
            <h2>Tâches En Attente</h2>
            <p>{{ data.pendingTasks }}</p>
        </article>
    </div>
</section>

{{ include('layouts/footer.php') }}