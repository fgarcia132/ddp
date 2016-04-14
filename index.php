<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Data Design Project</title>
	</head>
	<body>
		<h1>The Candid Appetite</h1>
			<h2>1. Front End</h2>
				<p>
					Persona: The typical persona is someone looking for recipes that values production value. They would also appreciate a step by step guide of, not only written instructions, but step by step photo documentation as well.
				</p>
				<p>
					Use Case: The Persona wants to put time and effort into their next planned out, home cooked meal. They remember a soup that they had from an Italian Restaurant but don't necessarily like the Restaurant so aren't planning on going back. They search specifically for the soup and find a popular recipe on thecandidappetite blog. They go to the blog page and see the plentiful step by step recipe and photo journal. They end up making the recipe and enjoy it enough to want to add a reply of their enjoyment from making the soup in the comment section at the bottom of the blog page. In addition, since the Persona enjoyed using the recipe they noticed tags that let to other sections of recipes that they are interested in cooking in the future.
				</p>
		<hr>
			<h2>2. Back End</h2>
				<h3>Entities</h3>
					<ul>
						<li>recipe</li>
						<li>comment</li>
						<li>tag</li>
					</ul>
		<hr>
				<h3>Entity Attributes</h3>
					<h4>Recipe</h4>
						<ul>
							<li>recipeContent</li>
						</ul>
					<h4>Comment</h4>
						<ul>
							<li>email</li>
							<li>name</li>
							<li>dateTime</li>
							<li>replyContent</li>
						</ul>
					<h4>Tag</h4>
						<ul>
							<li>foodType</li>
						</ul>
		<hr>
				<h3>Primary Keys and Foreign Keys</h3>
					<h4>Recipe Relations</h4>
						<ul>
							<li>many recipes can have many comments</li>
							<li>many recipes can have many tags</li>
						</ul>
					<h4>Comment Relations</h4>
						<ul>
							<li>many comments to one recipe</li>
							<li>each comment can have many comments</li>
						</ul>
					<h4>Tag Relations</h4>
						<ul>
							<li>many tags can be on many recipes</li>
						</ul>
		<hr>
				<h2>ERD</h2>
					<img src="ddp4.svg" />

	</body>
</html>