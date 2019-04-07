//DOESN'T WORK JUST YET
//not entirely sure why it doesn't select the inputs, I thought it would
//might have to try and make the form table cells like in PW3
$(document).ready(function() 
{
	//declare all needed spans and hide all of them
	//tr:first selects first child
	//span:first-of-type selects the first span tag
	//nth-child and nth-of-type work in similar ways
	//since the first span of each section needs to display different info text
	//they have to be declared separately, and then give all of them a class
	
	//every single span is appended to each form row, i.e., they're a new column/data cell
	$("form").find(":input:first").append("<span>Enter your first name</span>");
	$("form").find(":input:nth-of-type(2)").append("<span>Enter your last name</span>");
	$("form").find(":input:nth-of-type(3)").append("<span>Enter your street address</span>");
	$("form").find(":input:nth-of-type(4)").append("<span>Enter your city</span>");
	$("form").find(":input:nth-of-type(5)").append("<span>Enter your state</span>");
	$("form").find(":input:nth-of-type(6)").append("<span>Enter your phone number</span>");
	$("form").find(":input:nth-of-type(7)").append("<span>Enter your email</span>");
	$("form").find(":input:nth-of-type(8)").append("<span>Enter a password, minimum 6 characters</span>");
	$("form").find(":input").find("span:first-of-type").addClass("info");
	
	//then we append the OK and Error spans and classes to all form rows
	$("form").find(":input").append("<span>OK</span>");
	$("form").find(":input").find("span:nth-of-type(2)").addClass("ok");
	$("form").find(":input").append("<span>Error</span>");
	$("form").find(":input").find("span:nth-of-type(3)").addClass("error");
	
	//then we hide all messages
	$("form").find(":input").find(".info").hide();
	$("form").find(":input").find(".ok").hide();
	$("form").find(":input").find(".error").hide();
	
	$("#fname").focusin(function() 
	{
		$("form").find(":input:first").find(".info").show();
		$("form").find(":input:first").find(".ok").hide();
		$("form").find(":input:first").find(".error").hide();
	});
	
	$("#fname").focusout(function() 
	{
		if($("#fname").val() == "") 
		{
			$("form").find(":input:first").find(".info").hide();
		} 
		else if($("#fname").val() != "") 
		{
			var letters = /^[0-9a-zA-Z]+$/;
			var entry = $("#fname").val();
			if(letters.test(entry)) //test() returns true if it matches
			{
				$("form").find(":input:first").find(".info").hide();
				$("form").find(":input:first").find(".ok").show();
			}	
			else 
			{
				$("form").find(":input:first").find(".info").hide();
				$("form").find(":input:first").find(".error").show();
			}
		} 
	});
	
	
	$("#password").focusin(function() 
	{
		$("form").find(":input:nth-of-type(2)").find(".info").show();
		$("form").find(":input:nth-of-type(2)").find(".ok").hide();
		$("form").find(":input:nth-of-type(2)").find(".error").hide();
	});
	
	$("#password").focusout(function() 
	{
		if($("#password").val() == "") 
		{
			$("form").find(":input:nth-of-type(2)").find(".info").hide();
		} 
		else if($("#password").val() != "") 
		{
			var passlength = $("#password").val();
			if(passlength.length >= 6)
			{
				$("form").find(":input:nth-of-type(2)").find(".info").hide();
				$("form").find(":input:nth-of-type(2)").find(".ok").show();
			}	
			else 
			{
				$("form").find(":input:nth-of-type(2)").find(".info").hide();
				$("form").find(":input:nth-of-type(2)").find(".error").show();
			}
		} 
	});


	$("#email").focusin(function() 
	{
		$("form").find(":input:nth-of-type(3)").find(".info").show();
		$("form").find(":input:nth-of-type(3)").find(".ok").hide();
		$("form").find(":input:nth-of-type(3)").find(".error").hide();
	});
	
	$("#email").focusout(function() 
	{
		if($("#email").val() == "") 
		{
			$("form").find(":input:nth-of-type(3)").find(".info").hide();
		} 
		else if($("#email").val() != "") 
		{
			var emailcontent = $("#email").val();
			var n = emailcontent.includes("@"); //returns true if includes
			if(n)
			{
				$("form").find(":input:nth-of-type(3)").find(".info").hide();
				$("form").find(":input:nth-of-type(3)").find(".ok").show();
			}	
			else 
			{
				$("form").find(":input:nth-of-type(3)").find(".info").hide();
				$("form").find(":input:nth-of-type(3)").find(".error").show();
			}
		} 
	});
});
