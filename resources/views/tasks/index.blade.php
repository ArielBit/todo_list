<!-- Formulaire pour ajouter une nouvelle tâche -->
<form action="/task" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Nouvelle tâche" required>
    <button type="submit">Ajouter</button>
</form>

<ul>
@foreach ($tasks as $task)
    <li>
        <!-- Formulaire de modification -->
        <form action="/task/{{ $task->id }}" method="POST" style="display:inline;">
            @csrf
            @method('PUT')
            <input type="text" name="title" value="{{ $task->title }}" required>
            <button type="submit">💾</button>
        </form>

        <!-- Formulaire de suppression -->
        <form action="/task/{{ $task->id }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">❌</button>
        </form>
    </li>
@endforeach
</ul>
