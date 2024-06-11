<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
		<script src="https://kit.fontawesome.com/b632dc8495.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="<?php echo e(asset('/css/dashboard.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('/css/style.css')); ?>">
  </head>
  <body style="background: #EEEEEE;">
		<div class="col-lg-12 m-auto p-3 mt-2">
			<a href="<?php echo e(route('create')); ?>" class="btn bg-aqua text-white rounded-1 py-2 px-3">ADD NEW</a>
		</div>
		<div class="col-lg-12 m-auto p-3 mt-4">
			<div class="bg-white p-5 position-relative shadow-xl rounded-1">
				<div class="bg-purple-gradient position-absolute text-white m-auto rounded-1" style="width: 98%;top: -4%; left: 0; right: 0;">
					<p class="ms-3 mt-3">All Product</p>
				</div>
				<table class="table table-responsive w-100" id="table">
					<thead>
						<tr>
							<th scope="row" style="color: #A742BA;">ID</th>
							<th class="text-center" style="color: #A742BA;">Jenis Produk</th>
							<th style="color: #A742BA;">Deskripsi</th>
							<th style="color: #A742BA;">Gambar</th>
							<th style="color: #A742BA;">Created At</th>
							<th style="color: #A742BA;">Updated At</th>
							<th style="color: #A742BA;">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<th scope="row"><?php echo e($product->id); ?></th>
								<td><?php echo e($product->jenis); ?></td>
								<td><?php echo e($product->deskripsi); ?></td>
								<td>
									<img src="<?php echo e(asset('images/'.$product->gambar)); ?>" alt="<?php echo e($product->gambar); ?>" style="width: 100px;">
								</td>
								<td><?php echo e($product->created_at); ?></td>
								<td><?php echo e($product->updated_at); ?></td>
								<td>
									<a href="<?php echo e(route('edit', $product->id)); ?>" class="btn bg-aqua text-white mb-1"><i class="fas fa-edit"></i></a>
									<form action="<?php echo e(route('delete', $product->id)); ?>" method="POST" class="d-inline">
										<?php echo csrf_field(); ?>
										<?php echo method_field('DELETE'); ?>
										<button type="submit" class="btn bg-red text-white" onclick="return confirm('Are you sure? you want to delete this?')"><i class="fas fa-trash"></i></button>
									</form>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<script>
			$(document).ready(function() {
				// disable 10 entries and search bar
				$('#table').DataTable({
					"lengthChange": false,
					"searching": false,
					"paging": false					 
				});
			});
		</script>

		<?php if(Session::has('success')): ?>
			<script>
				alert("<?php echo e(Session::get('success')); ?>");
			</script>
		<?php endif; ?>
  </body>
</html><?php /**PATH C:\Users\ASUS\Documents\backup\!WORK\tugas_andi\resources\views/dashboard/index.blade.php ENDPATH**/ ?>