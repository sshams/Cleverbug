// JavaScript Document
var user_id;

$("#login").live("pageinit", function(event) { //load
	$("#loginButton").click(function(event) {
		if($("#username").val() && $("#password").val()) {
			$.ajax({
  				url: "/cleverbug/index.php/login",
				type: "POST",
				data: {username : $("#username").val(), password: $("#password").val()},
				beforeSend: function(xmlHttpRequest) {
					xmlHttpRequest.setRequestHeader('Accept', 'application/json');
				}
			}).done(function(data) {
				if(data) {
					$("#userList").html("");
					for(var i=0; i<data.length; i++) {
						$("#userList").append('<li user_id="' + data[i].user_id + '"><a href="#"><img src="/cleverbug/images/' + data[i].user_id + '.jpg" class="ui-li-icon" />' + data[i].username + ' - ' +  data[i].dob + '</a></li>');	
					}
					$.mobile.changePage("#welcome");
				}
			});
		} else {
			alert("Enter username and password");	
		}
	});
});

$("#welcome").live("pageinit", function(event) { //click
	$(".users > li").click(function() {
		user_id = $(this).attr("user_id");
		$.mobile.changePage("#details");
	});
	
	$("#logout").click(function(event) {
        document.location.href = "/cleverbug/";
    });
});



$("#details").live("pageinit", function(event) {
	$("#backButton").click(function() {
		$.mobile.changePage("#welcome");
	});


});

$('#details').live('pagebeforeshow', function(event, ui){
	if(user_id) {
		$.ajax({
			url: "/cleverbug/index.php/user/" + user_id,
			type: "GET",
			beforeSend: function(xmlHttpRequest) {
				xmlHttpRequest.setRequestHeader('Accept', 'application/json');
			}
		}).done(function(data) {
			if(data) {
				$("#photo").attr("src", "/cleverbug/images/" + data.user_id + ".jpg");
				$("#usernameSpan").html(data.username);
				$("#dobSpan").html(data.dob);
			}
		});	
	} else {
		$.mobile.changePage("#login");
	}
});