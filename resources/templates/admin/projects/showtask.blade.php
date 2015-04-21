@extends('admin.base')

@section('head')
    <meta property="CSRF-token" content="{{ Session::token() }}"/>
@endsection

@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <header class="client-page-header clearfix">
            <h1 class="content-header">{{ $task->name }} for {{ $task->project->client->name }}</h1>

        </header>
        <ul class="task-vitals">
            <li>
                {!! $task->present()->statusWithIcon() !!}
                <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li><a href="#" class="task-status-button" data-icon="fa fa-rocket" data-status="Underway">Underway</a></li>
                        <li><a href="#" class="task-status-button" data-icon="fa fa-cog" data-status="Ongoing">Ongoing</a></li>
                        <li><a href="#" class="task-status-button" data-icon="fa fa-spinner" data-status="Waiting on client">Waiting on client</a></li>
                        <li><a href="#" class="task-status-button" data-icon="fa fa-smile-o" data-status="Almost done">Almost done</a></li>
                        <li><a href="#" class="task-status-button" data-icon="fa fa-thumbs-down" data-status="Aborted">Aborted</a></li>
                        <li><a href="#" class="task-status-button" data-icon="fa fa-check-circle" data-status="Complete">Complete</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <span class="fa fa-clock-o"></span><span> <strong>Deadline: </strong> {{ $task->deadline }}</span>
                <div class="btn-group">
                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li>
                            <input type="date" class="form-control"/>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
        <hr class="content-divider"/>
        <ul class="nav nav-tabs task-tab-bar" role="tablist" id="tasksTab">
            <li role="presentation" class="active"><a href="#brief" aria-controls="brief" role="tab" data-toggle="tab">Brief</a></li>
            <li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
            <li role="presentation"><a href="#messages" aria-controls="files" role="tab" data-toggle="tab">Files</a></li>
            <li role="presentation"><a href="#settings" aria-controls="todo" role="tab" data-toggle="tab">ToDo List</a></li>
        </ul>

        <div class="tab-content task-tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="brief">
                <div class="client-brief-box">
                    {!! $task->brief !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="notes">
                {{ $task->notes }}
            </div>
            <div role="tabpanel" class="tab-pane fade" id="messages">
                @foreach($task->taskFiles as $file)
                    {!! $file->present()->fileAsHtmlView() !!}
                @endforeach
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">Simple todo app will be here</div>
        </div>
    </div>
@endsection

@section('bodyscripts')
    @parent
    <script>
        $(function () {
            $('#tasksTab a:last').tab('show')
        })

        var taskStatusManager = {
            status: null,
            icon: 'fa fa-check',

            init: function() {
                var buttons = document.querySelectorAll('.task-status-button');
                var i = 0, l = buttons.length;

                for(i;i<l;i++) {
                    buttons[i].addEventListener('click', function(ev) {
                        taskStatusManager.setStatus(ev.target.getAttribute('data-status'), ev.target.getAttribute('data-icon'));
                    }, false);
                }
            },

            setStatus: function(status, icon) {
                taskStatusManager.status = status;
                taskStatusManager.icon = icon;
                taskStatusManager.sendStatus();
            },

            showStatus: function() {
                var statusText = document.querySelector('#task-status').innerHTML = taskStatusManager.status;
                document.querySelector('#status-icon').className = taskStatusManager.icon;
            },

            sendStatus: function() {
                var req = new XMLHttpRequest();
                var formData = new FormData();
                formData.append('status', taskStatusManager.status);
                formData.append('_token', document.querySelector('meta[property=CSRF-token]').getAttribute('content'));
                req.open('POST', '/admin/tasks/{{ $task->id }}/status', true);
                req.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                req.onreadystatechange = function(ev) {
                    if(req.readyState === 4) {
                        if(req.status === 200) {
                            console.log(ev.target.response);
                            taskStatusManager.showStatus();
                        } else {
                            console.log(ev.target);
                        }
                    }
                }
                req.send(formData);
            }
        }
        taskStatusManager.init();
    </script>
@endsection