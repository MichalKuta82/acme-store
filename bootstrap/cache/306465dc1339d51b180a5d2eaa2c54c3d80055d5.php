<?php $__env->startSection('title','Products Categories'); ?>
<?php $__env->startSection('data-page-id','adminCategories'); ?>

<?php $__env->startSection('content'); ?>
	<div class="category">
		<div class="row expanded">
			<h2>Products Categories</h2>
		</div>
		<?php echo $__env->make('includes.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="row expanded">
			<div class="grid-x grid-padding-x">
				<div class="cell small-12 medium-6">
					<form action="" method="post">
						<div class="input-group">
							<input type="text"  class="input-group-field" placeholder="Search by name">
							<div class="input-group-button">
								<input type="submit" class="button" value="Search">
							</div>
						</div>
					</form>
				</div>
				
				<div class="cell small-12 medium-5">
					<form action="/admin/product/categories" method="post">
						<div class="input-group">
							<input type="text"  class="input-group-field" name="name" placeholder="Category Name">
							<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
							<div class="input-group-button">
								<input type="submit" class="button" value="Create">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row expanded">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 medium-11">
						<?php if(count($categories)): ?>
						<table class="hover unstriped" border="1" data-form="deleteForm">
							<thead>
								<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>DateCreated</th>
								<th width="80">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($category['name']); ?></td>
									<td><?php echo e($category['slug']); ?></td>
									<td><?php echo e($category['added']); ?></td>
									<td width="80" class="text-right">
										<span data-tooltip tabindex="1" title="Add Category" class="has-tip top">
											<a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class="fa fa-plus"></i></a>
										</span>
										<span data-tooltip tabindex="1" title="Edit Category" class="has-tip top">
											<a data-open="item-<?php echo e($category['id']); ?>"><i class="fa fa-edit"></i></a>
										</span>
										<span style="display: inline-block;" data-tooltip tabindex="1" title="Delete Category" class="has-tip top">
											<form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete" class="delete-item">
												<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
												<button type="submit"><i class="fa fa-times delete"></i></button>
											</form>
										</span>
    
                                            <!--Edit category modal-->
                                           	<div class="reveal" id="item-<?php echo e($category['id']); ?>" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Edit Category</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="item-name-<?php echo e($category['id']); ?>" value="<?php echo e($category['name']); ?>" name="name">
														<div>
															<input type="submit" name="token" class="button update-category" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" value="Update" id="<?php echo e($category['id']); ?>">
														</div>
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>

											<!--Add subcategory modal-->
                                           	<div class="reveal" id="add-subcategory-<?php echo e($category['id']); ?>" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Add Subcategory</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="subcategory-name-<?php echo e($category['id']); ?>">
														<div>
															<input type="submit" name="token" class="button add-subcategory" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" value="Create" id="<?php echo e($category['id']); ?>">
														</div>
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>
                                        </td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
						<?php echo $links; ?>

						<?php else: ?>
							<h2>You have not created any category</h2>
						<?php endif; ?>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<div class="subcategory">
		<div class="row expanded">
			<h2>Subcategories</h2>
		</div>

			<div class="row expanded">
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 medium-11">
						<?php if(count($subcategories)): ?>
						<table class="hover unstriped" border="1" data-form="deleteForm">
							<thead>
								<tr>
								<th>Name</th>
								<th>Slug</th>
								<th>DateCreated</th>
								<th width="50">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($subcategory['name']); ?></td>
									<td><?php echo e($subcategory['slug']); ?></td>
									<td><?php echo e($subcategory['added']); ?></td>
									<td width="50" class="text-right">
										<span data-tooltip tabindex="1" title="Edit Subcategory" class="has-tip top">
											<a data-open="item-subcategory-<?php echo e($subcategory['id']); ?>"><i class="fa fa-edit"></i></a>
										</span>
										<span style="display: inline-block;" data-tooltip tabindex="1" title="Delete Subcategory" class="has-tip top">
											<form method="POST" action="/admin/product/subcategory/<?php echo e($subcategory['id']); ?>/delete" class="delete-item">
												<input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
												<button type="submit"><i class="fa fa-times delete"></i></button>
											</form>
										</span>
    
                                            <!--Edit subcategory modal-->
                                           	<div class="reveal" id="item-subcategory-<?php echo e($subcategory['id']); ?>" data-reveal data-close-on-click="false" data-close-on-esc="false" data-animation-in="scale-in-up">
                                           		<div class="notification callout primary">
                                           			
                                           		</div>
                                           		<h2>Edit Subcategory</h2>
											  	<form>
													<div class="input-group">
														<input type="text" id="item-subcategory-name-<?php echo e($subcategory['id']); ?>" value="<?php echo e($subcategory['name']); ?>">
													</div>
													<div class="input-group">
														<label>Change Category
															<select id="item-category-<?php echo e($subcategory['category_id']); ?>">
																<?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<?php if($category->id == $subcategory['category_id']): ?>
																		<option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
																	<?php endif; ?>
																		<option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
														</label>
													</div>
													<div class="input-group">
														<input type="submit" data-category-id="<?php echo e($subcategory['category_id']); ?>" class="button update-subcategory" data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>" value="Update" id="<?php echo e($subcategory['id']); ?>">
													</div>
												</form>
											  <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
											    <span aria-hidden="true">&times;</span>
											  </a>
											</div>
                                        </td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
						<?php echo $subcategories_links; ?>

						<?php else: ?>
							<h2>You have not created any subcategory</h2>
						<?php endif; ?>
					</div>	
				</div>
			</div>
		</div>
	</div>

	<?php echo $__env->make('includes.delete-modal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>