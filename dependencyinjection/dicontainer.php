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

namespace OCA\MLDonkey\DependencyInjection;

use OCA\AppFramework\DependencyInjection\DIContainer as BaseContainer;

use OCA\MLDonkey\Controller\MLDonkeyController;
use OCA\MLDonkey\Db\ItemMapper;


class DIContainer extends BaseContainer {


	/**
	 * Define your dependencies in here
	 */
	public function __construct(){
		// tell parent container about the app name
		parent::__construct('mldonkey');

		// use this to specify the template directory
		$this['TwigTemplateDirectory'] = __DIR__ . '/../templates';

		// if you want to cache the template directory in yourapp/cache
		// uncomment this line. Remember to give your webserver access rights
		// to the cache folder 
		//$this['TwigTemplateCacheDirectory'] = __DIR__ . '/../cache';		

		/**
		 * CONTROLLERS
		 */

		$this['MLDonkeyController'] = function($c){
			return new MLDonkeyController($c['API'], $c['Request']);
		};

	}
}

