$(document).ready(function() 
{
	//declare all needed spans and hide all of them
	//tr:first selects first child
	//span:first-of-type selects the first span tag
	//nth-child and nth-of-type work in similar ways
	//since the first span of each section needs to display different info text
	//they have to be declared separately, and then give all of them a class
	
	//every single span is appended to each table row, i.e., they're a new column/data cell
	$("table").find("tr:first").append("<span>Enter your first name</span>");
	$("table").find("tr:nth-child(2)").append("<span>Enter your last name</span>");
	$("table").find("tr:nth-child(3)").append("<span>Enter your street address</span>");
	$("table").find("tr:nth-child(4)").append("<span>Enter your city</span>");
	$("table").find("tr:nth-child(5)").append("<span>Enter your state</span>");
	$("table").find("tr:nth-child(6)").append("<span>Enter your phone number</span>");
	$("table").find("tr:nth-child(7)").append("<span>Enter your email</span>");
	$("table").find("tr:nth-child(8)").append("<span>Enter a password, minimum 6 characters</span>");
	$("table").find("tr").find("span:first-of-type").addClass("info");
	
	//then we append the OK and Error spans and add classes to all table rows
	$("table").find("tr").append("<span>OK</span>");
	$("table").find("tr").find("span:nth-of-type(2)").addClass("ok");
	$("table").find("tr").append("<span>Error</span>");
	$("table").find("tr").find("span:nth-of-type(3)").addClass("error");
	
	//then we hide all messages
	$("table").find("tr").find(".info").hide();
	$("table").find("tr").find(".ok").hide();
	$("table").find("tr").find(".error").hide();
	
	//first name input
	$("#fname").focusin(function() 
	{
		$("table").find("tr:first").find(".info").show();
		$("table").find("tr:first").find(".ok").hide();
		$("table").find("tr:first").find(".error").hide();
	});
	
	$("#fname").focusout(function() 
	{
		if($("#fname").val() == "") 
		{
			$("table").find("tr:first").find(".info").hide();
		} 
		else if($("#fname").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#fname").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:first").find(".info").hide();
				$("table").find("tr:first").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:first").find(".info").hide();
				$("table").find("tr:first").find(".error").show();
			}
		} 
	});

	//last name input
	$("#lname").focusin(function() 
	{
		$("table").find("tr:nth-child(2)").find(".info").show();
		$("table").find("tr:nth-child(2)").find(".ok").hide();
		$("table").find("tr:nth-child(2)").find(".error").hide();
	});
	
	$("#lname").focusout(function() 
	{
		if($("#lname").val() == "") 
		{
			$("table").find("tr:nth-child(2)").find(".info").hide();
		} 
		else if($("#lname").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#lname").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:nth-child(2)").find(".info").hide();
				$("table").find("tr:nth-child(2)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(2)").find(".info").hide();
				$("table").find("tr:nth-child(2)").find(".error").show();
			}
		} 
	});

	//address name input
	$("#address").focusin(function() 
	{
		$("table").find("tr:nth-child(3)").find(".info").show();
		$("table").find("tr:nth-child(3)").find(".ok").hide();
		$("table").find("tr:nth-child(3)").find(".error").hide();
	});
	
	$("#address").focusout(function() 
	{
		if($("#address").val() == "") 
		{
			$("table").find("tr:nth-child(3)").find(".info").hide();
		} 
		else if($("#address").val() != "") 
		{
			var letters = /[a-z\d\-_\s]+/i;
			var entry = $("#address").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:nth-child(3)").find(".info").hide();
				$("table").find("tr:nth-child(3)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(3)").find(".info").hide();
				$("table").find("tr:nth-child(3)").find(".error").show();
			}
		} 
	});

	//city name input
	$("#city").focusin(function() 
	{
		$("table").find("tr:nth-child(4)").find(".info").show();
		$("table").find("tr:nth-child(4)").find(".ok").hide();
		$("table").find("tr:nth-child(4)").find(".error").hide();
	});
	
	$("#city").focusout(function() 
	{
		if($("#city").val() == "") 
		{
			$("table").find("tr:nth-child(4)").find(".info").hide();
		} 
		else if($("#city").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#city").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:nth-child(4)").find(".info").hide();
				$("table").find("tr:nth-child(4)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(4)").find(".info").hide();
				$("table").find("tr:nth-child(4)").find(".error").show();
			}
		} 
	});

	//state name input
	$("#state").focusin(function() 
	{
		$("table").find("tr:nth-child(5)").find(".info").show();
		$("table").find("tr:nth-child(5)").find(".ok").hide();
		$("table").find("tr:nth-child(5)").find(".error").hide();
	});
	
	$("#state").focusout(function() 
	{
		if($("#state").val() == "") 
		{
			$("table").find("tr:nth-child(5)").find(".info").hide();
		} 
		else if($("#state").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#state").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:nth-child(5)").find(".info").hide();
				$("table").find("tr:nth-child(5)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(5)").find(".info").hide();
				$("table").find("tr:nth-child(5)").find(".error").show();
			}
		} 
	});

	//phone name input
	$("#phone").focusin(function() 
	{
		$("table").find("tr:nth-child(6)").find(".info").show();
		$("table").find("tr:nth-child(6)").find(".ok").hide();
		$("table").find("tr:nth-child(6)").find(".error").hide();
	});
	
	$("#phone").focusout(function() 
	{
		if($("#phone").val() == "") 
		{
			$("table").find("tr:nth-child(6)").find(".info").hide();
		} 
		else if($("#phone").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#phone").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("table").find("tr:nth-child(6)").find(".info").hide();
				$("table").find("tr:nth-child(6)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(6)").find(".info").hide();
				$("table").find("tr:nth-child(6)").find(".error").show();
			}
		} 
	});
	
	//email input
	$("#email").focusin(function() 
	{
		$("table").find("tr:nth-child(7)").find(".info").show();
		$("table").find("tr:nth-child(7)").find(".ok").hide();
		$("table").find("tr:nth-child(7)").find(".error").hide();
	});
	
	$("#email").focusout(function() 
	{
		if($("#email").val() == "") 
		{
			$("table").find("tr:nth-child(7)").find(".info").hide();
		} 
		else if($("#email").val() != "") 
		{
			var emailcontent = $("#email").val();
			var n = emailcontent.includes("@"); //returns true if includes
			if(n)
			{
				$("table").find("tr:nth-child(7)").find(".info").hide();
				$("table").find("tr:nth-child(7)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(7)").find(".info").hide();
				$("table").find("tr:nth-child(7)").find(".error").show();
			}
		} 
	});
	
	//password input
	$("#password").focusin(function() 
	{
		$("table").find("tr:nth-child(8)").find(".info").show();
		$("table").find("tr:nth-child(8)").find(".ok").hide();
		$("table").find("tr:nth-child(8)").find(".error").hide();
	});
	
	$("#password").focusout(function() 
	{
		if($("#password").val() == "") 
		{
			$("table").find("tr:nth-child(8)").find(".info").hide();
		} 
		else if($("#password").val() != "") 
		{
			var passlength = $("#password").val();
			if(passlength.length >= 6)
			{
				$("table").find("tr:nth-child(8)").find(".info").hide();
				$("table").find("tr:nth-child(8)").find(".ok").show();
			}	
			else 
			{
				$("table").find("tr:nth-child(8)").find(".info").hide();
				$("table").find("tr:nth-child(8)").find(".error").show();
			}
		} 
	});
});