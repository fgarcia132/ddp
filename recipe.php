<?php
namespace Edu\Cnm\Fgarcia132\ddp;


/**
 * Cross Section of a Blog Post
 * The Recipe page is the Blog post/page itself. This shows how the page is published
 *
 * @author Francisco Garcia <fgarcia132@cnm.edu>
 */
class Recipe implements \JsonSerializable {
	use ValidateDate;
	/**
	 * id for this Recipe; this is the primary key
	 * @var int $recipeId
	 */
	private $recipeId;
	/**
	 * actual text of recipe
	 * @var string recipeContent
	 */
	private $recipeContent;
	/**
	 * date that recipe was published TIMESTAMP
	 * @var \DateTime recipeDate
	 */
	private $recipeDate;
	/**
	 * accessor method for recipe id
	 *
	 * @return int|null value of recipe id
	 */
	public function getRecipeId() {
		return($this->getRecipeId);
	}
	/**
	 * mutator method for recipe id
	 *
	 * @param int|null $newRecipeId new value of recipe id
	 * @throws \RangeException if $newRecipeId is not positive
	 * @throws \TypeError if $newRecipeId is not an integer
	 */
	public function setRecipeId(int $newRecipeId = null) {
		//base case: if the recipe id is null, this is a new recipe without a mySQL id
		if($newRecipeId === null) {
			$this->recipeId = null;
			return;
		}
		// verify the recipe id is positive
		if($newRecipeId <= 0) {
			throw(new \RangeException("recipe id is not positive"));
		}
		// convert and store the recipe id
		$$this->recipeId = $newRecipeId;
	}
	/**
	 * accessor method for comment id
	 *
	 * @return in value of profile id
	 */
	public function getCommentId() {
		return($this->commentId );
	}

	/**
	 * mutator method for comment id
	 *
	 * #param int $newCommentId new value of profile id
	 * @throws \RangeException if $newCommentId is not positive
	 * @throws \TypeError if $newCommentId is not an integer
	 */
	public function setCommentId(int $newCommentId) {
		// verify the comment id is positive
		if($newCommentId <= 0) {
			throw(new \RangeException("comment is is not positive"));
		}

		// convert and store the comment id
		$this->commentId = $newCommentId;
	}
	/**
	 * accessor method for recipe content
	 *
	 * @return value of recipe content
	 */
	public function getRecipeContent() {
		return($this->recipeContent);
	}

	/**
	 * mutator method for recipe content
	 *
	 * @param string $newRecipeContent new value of recipe content
	 * @throws \InvalidArgumentException if $newRecipeContent is not a string or insecure
	 * @throws \RangeException if $newRecipeContent is > 5000 characters
	 * @throws \TypeError if $newRecipeContent is not a string
	 */
	public function setRecipeContent(string $newRecipeContent) {
		//verify the recipe content is secure
		$newRecipeContent = trim($newRecipeContent);
		$newRecipeContent = filter_var($newRecipeContent, FILTER_SANITIZE_STRING);
		if(empty($newRecipeContent) === true) {
			throw(new \InvalidArgumentException("recipe content is empty or insecure"));
		}
		// verify the new recipe content will fit in the database
		if(strlen($newRecipeContent) > 5000) {
			throw(new \RangeException("recipe is too large"));
		}

		// store the recipe content
		$this->recipeContent = $newRecipeContent;
	}
	/**
	 * mutator method for recipe date
	 *
	 * @param \DateTime|string|null $newRecipeDate recipe date as a DateTime object or string (or null to load current time)
	 * @throws \InvalidArgumentException if $newRecipeDate is not a valid object or string
	 * @throws \RangeException if $newRecipeDate is a date that does not exist
	 */
	public function setRecipeDate($newRecipeDate = null) {
		// base case: if the date is null, use the current date and time
		if($newRecipeDate === null) {
			$this->recipeDate = new \DateTime();
			return;
		}

		// store the recipe date
		try {
			$newRecipeDate = $this->validateDate($newRecipeDate);
		} catch(\InvalidArgumentException $invalidArgument) {
			throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0,
				$invalidArgument));
		} catch(\RangeException $range) {
			throw(new \RangeException($range->getMessage(), 0, $range));
		}
		$this->recipeDate = $newRecipeDate;
	}

	/**
	 * inserts this Recipe into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 *
	 */
}