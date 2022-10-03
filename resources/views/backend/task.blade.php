<div class="row" id="task">
    <!-- Left col -->
    <section class="col-lg-7 connectedSortable">

        <!-- TO DO List -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    To Do List
                </h3>
                <div class="card-tools">
                    {{ $tasks->links() }}
                  </div>
                
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="todo-list" data-widget="todo-list" id="task">
                    @foreach ($tasks as $task)
                        <li {{ ($task->status == 1) ? 'class="done"' : '' }}>
                            <!-- checkbox -->
                            <div class="icheck-primary d-inline ml-2">
                                <input type="checkbox" name="todo1" id="{{ $task->id }}" class="clickme"
                                    {{ $task->status ? 'checked' : '' }}>
                                <label for="{{ $task->id }}"></label>
                            </div>
                            <!-- todo text -->
                            <span class="text">{{ $task->task }}</span>
                            <!-- Emphasis label -->
                            <small class="badge badge-warning"><i class="far fa-clock"></i>
                                {{ date('g:i a', strtotime($task->task_date)) }}</small>
                            <small class="badge badge-danger"><i class="far fa-calendar"></i>
                                {{ date('d-m-Y', strtotime($task->task_date)) }}</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a class="text-danger" href="{{ route('task.destroy', $task->id) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $task->id }}').submit();">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <form id="delete-form-{{ $task->id }}"
                                    action="{{ route('task.destroy', $task->id) }}" method="POST"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"data-toggle="modal"
                    data-target="#modal-default"><i class="fas fa-plus"></i> Add item</button>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add new Task</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="task">Task</label>
                        <input type="text" name="task" class="form-control" id="task" required>
                    </div>
                    <div class="modal-body">
                        <label for="task_date">Expiration Date</label>
                        <input class="form-control" id="task_date" data-date-format="dd/mm/yyyy"
                            placeholder="dd/mm/yyyy" name="task_date" autocomplete="off" required type="datetime-local" >
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Task</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">

        <!-- Map card -->
        <div class="card bg-gradient-primary">
            <!-- /.card-body-->
            <div class="card-footer bg-transparent">
                <div class="row">
                    <div class="col-4 text-center">
                        <div id="sparkline-1"></div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                        <div id="sparkline-2"></div>
                    </div>
                    <!-- ./col -->
                    <div class="col-4 text-center">
                        <div id="sparkline-3"></div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->

        <!-- Calendar -->
        <div class="card bg-gradient-success">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="far fa-calendar-alt"></i>
                    Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- right col -->
</div>

@push('custom_script')
    <script>
        $(document).ready(function() {
            $('.clickme').click(function() {
                var taskId = $(this).attr('id');

                var token = document.head.querySelector('meta[name="csrf-token"]');
                window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

                if ($(this).is(':checked')) {
                    axios.put('/api/task/status', {
                        status: 1,
                        id: taskId
                    }).then((response) => {
                        console.log(response)
                    });
                } else {
                    axios.put('/api/task/status', {
                        status: 0,
                        id: taskId
                    }).then((response) => {
                        console.log(response)
                    });
                }
            });

        });
    </script>
@endpush
