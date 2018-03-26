$('[val-name]').attr('data-parsley-maxlength', 25);
$('[val-name]').attr('data-parsley-pattern', /^[a-zA-Z]$|^[a-zA-Z][a-zA-Z\s-]*[a-zA-Z]$/);
$('[val-name]').attr('data-parsley-minlength', 2);

$('[val-phone]').attr('data-parsley-pattern', /\d{3}-\d{3}-\d{4}$/);

$('[val-address]').attr('data-parsley-maxlength', 100);

$('[val-birthplace]').attr('data-parsley-pattern', /^[a-zA-Z]$|^[a-zA-Z][a-zA-Z\s-]*[a-zA-Z]$/);
$('[val-birthplace]').attr('data-parsley-maxlength', 30);

$('[val-citizenship]').attr('data-parsley-maxlength', 30);
$('[val-citizenship]').attr('data-parsley-pattern', /^[a-zA-Z]+$/);
$('[val-citizenship]').attr('data-parsley-maxwords', 1);

$('[val-sss]').attr('data-parsley-maxlength', 10);

$('[val-license]').attr('data-parsley-maxlength', 10);