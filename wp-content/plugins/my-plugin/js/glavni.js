
var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', 'http://localhost/wordpress/wp-json/wp/v2/oglas');
ourRequest.onload = function() {
  if (ourRequest.status >= 200 && ourRequest.status < 400) {
    var data = JSON.parse(ourRequest.responseText);
  } else {
    console.log("We connected to the server, but it returned an error.");
  }
};

ourRequest.onerror = function() {
  console.log("Connection error");
};

ourRequest.send();


var submitButton = document.querySelector("#submitbtn");

if(submitButton)
{
		submitButton.addEventListener("click", function()
		{
				var ourPostData =
				{
					"title" : document.querySelector("#naziv").value,
					"content" : document.querySelector("#content").value,
					"status" : "publish"
				}
				var createPost = new XMLHttpRequest();
					createPost.open("POST", "http://localhost/wordpress/wp-json/wp/v2/oglas");
					createPost.setRequestHeader("X-WP-Nonce", magicalData.nonce);
					createPost.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
					createPost.send(JSON.stringify(ourPostData));
					createPost.onreadystatechange = function()
					{
					if(createPost.readyState == 4)
					{
						if (createPost.status == 201)
						{
							document.querySelector("#naziv").value = "";
							document.querySelector("#content").value = "";
						}else
						{
						alert("Error - try again!");
						}
					}
				}
			});

}
