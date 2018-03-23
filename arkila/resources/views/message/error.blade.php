@if (count($errors))
@foreach ($errors->all() as $error)




    <script type="text/javascript">
		$.notify({
			// options
			message: '{{ $error }}'
		},{
			// settings
			type: 'danger',
			delay: '999900',
			placement: {
				from: "bottom",
				align: "right"
			},
			icon: "fa fa-eye",
			animate: {
				enter: 'animated bounceIn',
				exit: 'animated bounceOut'
			}
		});


	</script>

@endforeach
@endif
