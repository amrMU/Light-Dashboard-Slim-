<a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteFaq<?php echo e(@$faq->id); ?>"><li class="fa fa-trash-o"></li></a>
	<div id="deleteFaq<?php echo e(@$faq->id); ?>" class="modal fade">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content tx-size-sm">
				<div class="modal-header pd-x-20">
					<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Are You Sure Make This Action?</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pd-20">
					This will be removed from your Database. You can edit faq info if you want to change something.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a class="btn btn-primary" href="<?php echo e(URL::to('/')); ?>/admin/faqs/<?php echo e(@$faq->id); ?>/delete">Delete</a>

				</div>
				</div>
			</div><!-- modal-dialog -->
		</div><!-- modal -->