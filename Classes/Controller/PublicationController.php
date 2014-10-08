<?php
namespace LeipzigUniversityLibrary\PubmanImporter\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * PublicationController
 */
class PublicationController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * publicationRepository
	 *
	 * @var \LeipzigUniversityLibrary\PubmanImporter\Domain\Repository\PublicationRepository
	 * @inject
	 */
	protected $publicationRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {

            $params = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('pubmanimporter');

            $pubRepo = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\LeipzigUniversityLibrary\PubmanImporter\Domain\Repository\PublicationRepository');

            if (!empty($params['objectId'])) {
                $publications = $pubRepo->loadList($params['objectId']);
            } else {
                $publications = $pubRepo->loadList();
            }

            $mimeType = $params['properties']['mime-type'];

            $this->view->assign('publications', $publications);
            $this->view->assign('params', $params);
            $this->view->assign('sourceUrl', $pubRepo);
	}

//	/**
//	 * action show
//	 *
//	 * @param \LeipzigUniversityLibrary\PubmanImporter\Domain\Model\Publication $publication
//	 * @return void
//	 */
//	public function showAction(\LeipzigUniversityLibrary\PubmanImporter\Domain\Model\Publication $publication) {
//            $this->view->assign('publication', $publication);
//	}

        /**
//	 * action show
//	 *
//	 * @return void
//	 */
        public function showAction() {
            $params = \TYPO3\CMS\Core\Utility\GeneralUtility::_GET('pubmanimporter');

            $pubRepo = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\LeipzigUniversityLibrary\PubmanImporter\Domain\Repository\PublicationRepository');

            $publication = $pubRepo->loadList($params['objectId']);


            $this->view->assign('publication', $publication);

        }

}