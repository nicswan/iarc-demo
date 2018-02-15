@if ( isset($topic->reference_info) )
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						References
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					{{$topic->reference_info}}
				</div>
			</div>
		</div>
	</div>
@endif