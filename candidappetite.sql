DROP TABLE IF EXISTS tag;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS recipe;

CREATE TABLE recipe (
        recipeId INT UNSIGNED AUTO_INCREMENT NOT NULL,
        recipeContent VARCHAR(5000) NOT NULL,
        recipeDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
	     PRIMARY KEY (recipeId)
);

CREATE TABLE comment (
        commentId INT UNSIGNED AUTO_INCREMENT NOT NULL,
		  recipeId INT UNSIGNED NOT NULL,
        email VARCHAR(128) NOT NULL,
        dateTime TIMESTAMP NOT NULL,
        replyContent VARCHAR(1000) NOT NULL,
        INDEX(recipeId),
        FOREIGN KEY(recipeId) REFERENCES  recipe(recipeId),
        PRIMARY KEY(commentId)
);

CREATE TABLE tag (
        tagId INT UNSIGNED NOT NULL,
	     recipeId INT UNSIGNED,
        foodType VARCHAR(128) NOT NULL,
        INDEX(recipeId),
        FOREIGN KEY(recipeId) REFERENCES recipe(recipeId),
        PRIMARY KEY(tagId)
);
