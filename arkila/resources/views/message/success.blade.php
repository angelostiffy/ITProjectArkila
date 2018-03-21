@if (session('success'))
        <script type="text/javascript">
		$(function(){
		
		  new PNotify({
		    title: 'Error',
		    text: '{{ session('success') }}',
		    type: 'success',
		    hide: 'false',
		    nonblock: {
		        nonblock: true
		    }
		  });
		});
	</script>
@endif