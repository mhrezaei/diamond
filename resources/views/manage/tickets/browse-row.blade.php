<td>
	<input id="gridSelector-{{$model->id}}" data-value="{{$model->id}}" class="gridSelector" type="checkbox" onchange="gridSelector('selector','{{$model->id}}')">
</td>

<td>
	<div>
		@if(Auth::user()->can('tickets-'.$model->department.'.edit'))
			<a href="javascript:void(0)" onclick="masterModal('{{ url("manage/tickets/".$model->department."/edit/".$model->id) }}')" >
				{{ $model->title }}
			</a>
		@else
			{{ $model->title }}
		@endif
	</div>
	<div class="mv5 f10 text-info">
		{{ $model->text_limited }}
	</div>
	<div class="mv5 f8 text-grey">
		{{ trans('forms.general.from').' '}}
		@if(Auth::user()->can('customers'))
			<a href="javascript:void(0)" class="f8" onclick="masterModal('{{ url("manage/customers/".$model->user->id."/view") }}')">
				<span class="f8 text-grey">
					{{ $model->user->full_name }}
				</span>
			</a>
		@else
			{{ $model->full_name }}
		@endif
		.
		@pd(jDate::forge($model->created_at)->format('j F Y [H:m]'))
	</div>
</td>

<td>
	<div>
		<a href="javascript:void(0)" onclick="masterModal('{{ url("manage/tickets/".$model->department."/reply/".$model->id) }}')" >
			@if($replies = $model->talks()->count())
				@pd($replies.' '.trans('tickets.reply'))
			@else
				{{ trans('tickets.no_reply') }}
			@endif
		</a>
	</div>
	<div class="mv5 f8 text-grey">
		@if($model->first_replied_by->id)
			{{ trans('tickets.first_reply_on' , [
				'name' => $model->first_replied_by->full_name ,
				'date' => $model->first_replied_at_formatted ,
			])}}
		@endif
	</div>
</td>


<td>
	@if($model->archived)
		<div class="text-grey">
			{{ trans('tickets.status.archive') }}
		</div>
	@else
		<div class="text-{{ $model->priority_color }}">
			{{ trans('tickets.status.'.$model->priority_code) }}
		</div>
	@endif
</td>

<td>
	@if($model->archived)
		<i class="fa fa-{{$model->feedback_icon}} text-{{$model->feedback_color}} f20"></i>
	@endif
</td>

<td>
	@include('manage.frame.widgets.grid-action' , [
		'id' => $model->id ,
		'actions' => [
//			['eye' , trans('manage.permits.view') , "urlN:".$model->say('preview')],
//			['pencil' , trans('manage.permits.edit') , "url:manage/posts/".$model->branch()->slug."/edit/-id-" , '*' , $model->canEdit()],
//			['times' , trans('forms.button.hard_delete') , 'modal:manage/posts/-id-/hard_delete' , "$module.bin" , $model->trashed() and Auth::user()->isDeveloper()] ,

		],
	])
</td>