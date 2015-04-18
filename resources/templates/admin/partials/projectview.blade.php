<div class="project-card">
    <a href="/admin/projects/{{ $project->id }}"><h2 class="project-name">{{ $project->name }}</h2></a>
    <p class="product-description">{{ $project->description }}</p>
    <p class="task-detail">Tasks: <span class="completed-task">{{ $project->getNumberOfCompleteTasks() }}</span> of <span class="total-tasks">{{ $project->tasks->count() }}</span> completed</p>
</div>