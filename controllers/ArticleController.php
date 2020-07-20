<?php
/**
 * Handles article requests
 * Class ArticleController
 */
class ArticleController extends Controller
{
	public function process($params)
	{
		// Creating a model instance which allows us to access articles
		$articleManager = new ArticleManager();

		// The URL for displaying article is entered
		if (!empty($params[0]))
		{
			// Retrieving an article by the URL
			$article = $articleManager->getArticle($params[0]);
			// If no article was found we redirect to the ErrorController
			if (!$article)
				$this->redirect('error');

			// HTML head
			$this->head = array(
					'title' => $article['title'],
					'description' => $article['description'],
			);

			// Setting template variables
			$this->data['title'] = $article['title'];
			$this->data['content'] = $article['content'];

			// Setting the template
			$this->view = 'article';
		}
		else
			// No URL entered so we list all articles
		{
			$articles = $articleManager->getArticles();
			$this->data['articles'] = $articles;
			$this->view = 'articles';
		}
	}
}