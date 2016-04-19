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
}