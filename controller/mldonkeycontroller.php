<?php

/**
* ownCloud - App Template Example
*
* @author David García Garzón
* @copyright 2013 David García Garzón david.garcia@guifibaix.coop 
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
* License as published by the Free Software Foundation; either
* version 3 of the License, or any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU AFFERO GENERAL PUBLIC LICENSE for more details.
*
* You should have received a copy of the GNU Affero General Public
* License along with this library.  If not, see <http://www.gnu.org/licenses/>.
*
*/

namespace OCA\MLDonkey\Controller;

use OCA\AppFramework\Controller\Controller;


class MLDonkeyController extends Controller {

	/**
	 * @param Request $request: an instance of the request
	 * @param API $api: an api wrapper instance
	 * @param ItemMapper $itemMapper: an itemwrapper instance
	 */
	public function __construct($api, $request){
		parent::__construct($api, $request);
	}

	/**
	 * ATTENTION!!!
	 * The following comments turn off security checks
	 * Please look up their meaning in the documentation!
	 *
	 * @CSRFExemption
	 * @IsAdminExemption
	 * @IsSubAdminExemption
	 *
	 * @brief renders the index page
	 * @return an instance of a Response implementation
	 */
	public function index(){
		\OCP\Util::writeLog('mldonkey', "Index", \OCP\Util::WARN);
		$templateName = 'mldonkey';
		$params = array(
			'msg' => 'Hola mundo!',
		);
		return $this->render($templateName, $params);
	}

	/**
	 * @CSRFExemption
	 * @Ajax
	 *
	 * @brief retrieves the transfers
	 * @param array $urlParams: an array with the values, which were matched in 
	 *                          the routes file
	 */
	public function transfers(){

		\OCP\Util::writeLog('mldonkey', "Transfers", \OCP\Util::WARN);

		$params = array(
			array(
				"0000000000000000",
				"Parchis - Discography.zip",
				20,
				34,
				80000,
			),
			array(
				"5555555555555555",
				"Los Pecos - Discography.rar",
				53,
				0,
				140300000,
			),
			array(
				1,2,3,4,5
			),
		);

		return $this->renderJSON($params);
	}

	/**
	 * @CSRFExemption
	 * @Ajax
	 *
	 * @brief retrieves the transfers
	 * @param array $urlParams: an array with the values, which were matched in 
	 *                          the routes file
	 */
	public function searches(){

		\OCP\Util::writeLog('mldonkey', "Searches", \OCP\Util::WARN);

		$params = array(
			array(0, 0, 'Donkey', 'blabla', 32),
			array(1, 1, 'Donkey', 'blabla', 12),
			array(2, 2, 'Donkey', 'blabla', 52),
			array(3, 3, 'Donkey', 'blabla', 82),
			array(4, 2, 'Donkey', 'blabla', 0),
		);

		return $this->renderJSON($params);
	}

	/**
	 * @CSRFExemption
	 * @Ajax
	 *
	 * @brief retrieves user's searches
	 * @param array $urlParams: an array with the values, which were matched in 
	 *                          the routes file
	 */
	public function results(){

		\OCP\Util::writeLog('mldonkey', "Search Results", \OCP\Util::ERROR);

		$searchid = $this->params("searchid");

		$params = array(
			array(0, 0, 'Donkey', 'blabla0-'.$searchid, 4, 0, 32),
			array(1, 1, 'Donkey', 'blabla1-'.$searchid, 4, 1, 12),
			array(2, 0, 'Donkey', 'blabla2-'.$searchid, 4, 3, 52),
			array(3, 0, 'Donkey', 'blabla3-'.$searchid, 4, 2, 82),
			array(4, 2, 'Donkey', 'blabla4-'.$searchid, 4, 2, 0),
		);

		return $this->renderJSON($params);
	}

}
