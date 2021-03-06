<?php
/**
 * Copyright (C) Leipzig University Library 2017 <info@ub.uni-leipzig.de>
 *
 * @author  Ulf Seltmann <seltmann@ub.uni-leipzig.de>
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License

 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */

namespace LeipzigUniversityLibrary\PubmanImporter\Controller;

/**
 * Class ArticleController
 */
class ArticleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * The ArticleRepository
	 *
	 * @var \LeipzigUniversityLibrary\PubmanImporter\Domain\Repository\ArticleRepository
	 * @inject
	 */
	protected $ArticleRepository = NULL;

	/**
	 * Shows the specified article
	 *
	 * @param string $Article
	 * @param string $Issue
	 * @param string $Journal
	 * @param string $Context
	 * @return void
	 */
	public function showAction($Article, $Issue = false, $Journal = false, $Context = false) {
		$this->ArticleRepository->setOptions($this->settings);

		$Article = $this->ArticleRepository->findByUid($Article);

		if ($Issue) $Article->setPid($Issue);

		$this->view->assign('Issue', $Issue);
		$this->view->assign('Journal', $Journal);
		$this->view->assign('Context', $Context);
		$this->view->assign('Article', $Article);
		$this->view->assign('RequestUri', $this->request->getRequestUri());
	}
}