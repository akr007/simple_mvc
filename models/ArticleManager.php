<?php
/**
 * Manages articles in the system
 * Class ArticleManager
 */
class ArticleManager
{

	/**
	 * Returns an article from the database by a URL
	 * @param string $url The URL
	 * @return array|false The article or false if not found
	 */
	public function getArticle($url)
	{
		return Db::queryOne('
			SELECT `article_id`, `title`, `content`, `url`, `description`
			FROM `article`
			WHERE `url` = ?
		', array($url));
	}

	/**
	 * Returns a list of all articles in the database
	 * @return array All the articles in the database
	 */
	public function getArticles()
	{
		return Db::queryAll('
			SELECT `article_id`, `title`, `url`, `description`
			FROM `article`
			ORDER BY `article_id` DESC
		');
	}

}