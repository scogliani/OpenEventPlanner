$(function() {			

				$.datepicker.setDefaults($.datepicker.regional['']);

				$('form input.dateReport').datetimepicker({
					showOn: "button",
					buttonImage: "{{ asset('bundles/doodleplusadmin/images/calendar.gif') }}",
					buttonImageOnly: true,
					hourGrid: 4,
					minuteGrid: 15,
					minDate: new Date
				}).attr("readonly","readonly");

				$('form input.datetimer1Begin, form input.datetimer2Begin').datetimepicker({
					showOn: "button",
					buttonImageOnly: true,
					hourGrid: 4,
					minuteGrid: 15,
					minDate: new Date
				}).attr("readonly","readonly");

				$('form input.datetimeBegin').datetimepicker({
					showOn: "button",
					buttonImage: "{{ asset('bundles/doodleplusadmin/images/calendar.gif') }}",
					buttonImageOnly: true,
					hourGrid: 4,
					minuteGrid: 15,
					minDate: new Date,
					onClose: function(dateText, inst) {
						var endDateTextBox = $('form input.datetimeEnd');
						if (endDateTextBox.val() != '') {
							var testStartDate = new Date(dateText);
							var testEndDate = new Date(endDateTextBox.val());
							if (testStartDate > testEndDate)
								endDateTextBox.val(dateText);
						}
					},
					onSelect: function (selectedDateTime){
						var start = $(this).datetimepicker('getDate');
						// $('form input.datetimer1Begin, form input.datetimer2Begin').datetimepicker('option', 'minDate', new Date(start.getTime()));
						$('form input.datetimeEnd').datetimepicker('option', 'minDate', new Date(start.getTime()));
					}
				}).attr("readonly","readonly");

				$('form input.datetimeEnd').datetimepicker({
					showOn: "button",
					buttonImage: "{{ asset('bundles/doodleplusadmin/images/calendar.gif') }}",
					buttonImageOnly: true,
					hourGrid: 4,
					minuteGrid: 15,
					minDate: new Date,
					onClose: function(dateText, inst) {
						var startDateTextBox = $('form input.datetimeBegin');
						if (startDateTextBox.val() != '') {
							var testStartDate = new Date(startDateTextBox.val());
							var testEndDate = new Date(dateText);
							if (testStartDate > testEndDate)
								startDateTextBox.val(dateText);
						}
						else {
							startDateTextBox.val(dateText);
						}
					},
					onSelect: function (selectedDateTime){
						var end = $(this).datetimepicker('getDate');
						$('form input.datetimeBegin').datetimepicker('option', 'maxDate', new Date(end.getTime()) );
					}
				}).attr("readonly","readonly");

				function tooglePrice(jq) {
					if (jq.is(':checked')) {
						if ($("input.price").val() == '') {
							$("input.price").val('0.00');
						}

						$("input.price").removeAttr("disabled");
					} else {
						$("input.price").val('');
						$("input.price").attr("disabled", "disabled");
					}
				}

				function toogleResend(jq) {
					if (jq.is(':checked')) {
						$("input.datetimer1Begin, input.datetimer2Begin").datetimepicker('option', 'buttonImage', "{{ asset('bundles/doodleplusadmin/images/calendar.gif') }}");
					} else {
						$("input.datetimer1Begin, input.datetimer2Begin").datetimepicker('option', 'buttonImage', "{{ asset('bundles/doodleplusadmin/images/empty.gif') }}");
						$("input.datetimer1Begin, input.datetimer2Begin").datetimepicker('option', 'minDate', new Date);
						$("input.datetimer1Begin, input.datetimer2Begin").val('');
						$("input.datetimer1Begin, input.datetimer2Begin").datetimepicker('option', 'setDate', null);
					}
				}

				function toogleGuest(jq) {
					if (jq.is(':checked')) {
						$(".withSo input").removeAttr("disabled");
					} else {
						$(".withSo input:radio").val(['0']);
						$(".withSo input").attr("disabled", "disabled");
					}
				}

				function toogleExtern(jq) {
					if (jq.is(':checked')) {
						$(".titleExtern, .contentExtern").removeAttr("disabled");
					} else {
						$(".titleExtern, .contentExtern").val('');
						$(".titleExtern, .contentExtern").attr("disabled", "disabled");
					}
				}

				$(window).load(function() {
					toogleGuest($(".hasGuests"));
					toogleResend($(".hasResend"));
					tooglePrice($(".hasPrice"));
					toogleExtern($(".hasExtern"));
				});

				$(".hasResend").click(function() {
					toogleResend($(this));
				});

				$(".hasPrice").click(function() {
					tooglePrice($(this));
				});

				$(".hasGuests").click(function() {
					toogleGuest($(this));
				});

				$(".hasExtern").click(function() {
					toogleExtern($(this));
				});

			});