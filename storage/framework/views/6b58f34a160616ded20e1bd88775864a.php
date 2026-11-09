

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Daftar Mahasiswa</h2>
    <a href="<?php echo e(route('students.create')); ?>" class="btn btn-primary mb-3">+ Tambah Mahasiswa Baru</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Name</th>
                <th>Study Program</th>
                <th>Date of Birth</th>
                <th>GPA</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($index + 1); ?></td>
                <td><?php echo e($student->nim); ?></td>
                <td><?php echo e($student->name); ?></td>
                <td><?php echo e($student->study_program); ?></td>
                <td><?php echo e($student->birth_date); ?></td>
                <td><?php echo e($student->gpa); ?></td>
                <td>
                    <?php if($student->is_active): ?>
                        <span class="badge bg-success">Active</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Inactive</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('students.edit', $student->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                    
                    <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\USER\uts-laravel-2457401019\resources\views/students/index.blade.php ENDPATH**/ ?>