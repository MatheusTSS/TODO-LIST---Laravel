<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>TODO LIST</h3>
                <hr>
                <div class="my-2">
                    <a href="<?php echo e(route('new_task')); ?>" class="btn btn-primary">Create Task </a>
                    <a href="<?php echo e(route('list_invisibles')); ?>" class="btn btn-primary">List Invisible Tasks </a>
                </div>
                <hr>

                <?php if($tasks->count() === 0): ?>
                    <p>Não Existem Tarefas a Realizar.</p>
                <?php else: ?>
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Task</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="width: 70%"><?php echo e($task->task); ?></td>
                                    <td>
                                        

                                        <?php if($task->done == null): ?>
                                            <a href="<?php echo e(route('task_done', ['id' => $task->id])); ?>"
                                                class="btn btn-primary btn-sm"> <i class="fa fa-check"></i></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('task_undone', ['id' => $task->id])); ?>"
                                                class="btn btn-success btn-sm"> <i class="fa fa-times"></i></a>
                                        <?php endif; ?>

                                        
                                        <a href="<?php echo e(route('edit_task', ['id' => $task->id])); ?>"
                                            class="btn btn-primary btn-sm"> <i class="fa fa-pencil"></i></a>

                                        
                                        <?php if($task->visible === 1): ?>
                                            <a href="<?php echo e(route('task_invisible', ['id' => $task->id])); ?>"
                                                class="btn btn-primary btn-sm"> <i class="fa fa-eye-slash"></i></a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('task_visible', ['id' => $task->id])); ?>"
                                                class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                    <p>Total: <strong><?php echo e($tasks->count()); ?></strong></p>
                <?php endif; ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todolist\resources\views/home.blade.php ENDPATH**/ ?>