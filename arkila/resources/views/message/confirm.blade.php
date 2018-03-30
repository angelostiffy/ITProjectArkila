<script>
	new PNotify({
			    title: 'Confirmation',
			    text: '<strong>AAA-123</strong> is on deck and has a remark of OB. Do you want to move this unit to the special units?',
			    icon: 'glyphicon glyphicon-question-sign',
			    hide: false,
			    confirm: {
			        confirm: true,
			        buttons: [{
			            text: 'No',
			            addClass: 'btn-default',
			            click: function(notice) {
			                notice.update({
			                    title: 'Confirmed',
			                    text: '<strong>AAA-123</srong> will remain on deck.',
			                    icon: true,
			                    type: 'info',
			                    hide: true,
			                    confirm: {
			                        confirm: false
			                    },
			                    buttons: {
			                        closer: true,
			                        sticker: true
			                    }
			                });
			            }
			        }, {
			            text: 'Yes',
			            addClass: 'btn-primary',
			            click: function(notice) {
			                notice.update({
			                    title: 'Confirmed',
			                    text: '<strong>AAA-123</strong> will be moved to special units',
			                    icon: true,
			                    type: 'info',
			                    hide: true,
			                    confirm: {
			                        confirm: false
			                    },
			                    buttons: {
			                        closer: true,
			                        sticker: true
			                    }
			                });
			            }
			        }]
			    },
			    buttons: {
			        closer: false,
			        sticker: false
			    }, a
			    history: {
			        history: false
			    }
			});
</script>