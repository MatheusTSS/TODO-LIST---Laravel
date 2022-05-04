<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h3>TODO LIST</h3>
                <hr>
                <h3 class="text-center mb-5">EDIT TASK</h3>

                <form action="<?php echo e(route('edit_task_submit')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id_task" value="<?php echo e($task->id); ?>">
                    <div class="row">
                        <div class="col-sm-4 offset-sm-4">
                            <div class="form-group">
                                <label for="text_edit_task">EDIT Task</label>
                                <input type="text" name="text_edit_task" id="text_edit_task" class="form-control"
                                    value="<?php echo e($task->task); ?>">
                            </div>

                            <div class="form-group">
                                <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Cancelar</a>
                                <input type="submit" value="Salvar" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\todolist\resources\views/edit_task_frm.blade.php ENDPATH**/ ?>