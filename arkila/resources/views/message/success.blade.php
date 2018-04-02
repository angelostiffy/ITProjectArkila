@if (session('success'))
<script type="text/javascript">
new PNotify({
        title: "Success!",
        text: "{{ session('success') }}",
        animate: {
        animate: true,
        in_class: 'slideInDown',
        out_class: 'fadeOut'
        },
        animate_speed: 'fast',
        nonblock: {
            nonblock: true
        },
        cornerclass: "",
        width: "",
        type: "success",
        stack: {"dir1": "down", "dir2": "right", "push": "top", "spacing1": 0, "spacing2": 0}
});

// new PNotify({
//     title: 'Success!',
//     text: 'That thing that you were trying to do worked.',
//     type: 'success'
//     animate: {
//         animate: true,
//         in_class: 'slideInDown',
//         out_class: 'fadeOut'
//     },
//     animate_speed: 'fast',
//     nonblock: {
//             nonblock: true
//     }
// });
</script>
@endif
