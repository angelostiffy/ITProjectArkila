@if (count($errors))
@foreach ($errors->all() as $error)

    <script type="text/javascript">
		$(function(){
		
		  new PNotify({
		    title: 'Error',
		    text: '{{ $error }}',
		    type: 'error',
		    hide: 'false',
		    nonblock: {
		        nonblock: true
		    }
		  });
		});
	</script>
@endforeach
@endif