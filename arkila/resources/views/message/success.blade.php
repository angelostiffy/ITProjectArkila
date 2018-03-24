@if (session('success'))
<script type="text/javascript">


$.notify({
  // options
  message: '{{ session('success') }}'
},{
  // settings
  type: 'success',
  postion: "bottom left",
  icon: "fa fa-check",
  animate: {
    enter: 'animated bounceIn',
    exit: 'animated bounceOut'
  }
});


</script>
@endif
