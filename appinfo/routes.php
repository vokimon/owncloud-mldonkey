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

namespace OCA\MLDonkey;

use \OCA\AppFramework\App;
use \OCA\MLDonkey\DependencyInjection\DIContainer;

$this->create('mldonkey_index', '/')->action(
	function($params){
		App::main('MLDonkeyController', 'index', $params, new DIContainer());
	}
);

$this->create('mldonkey_ajax_gettransfers', '/transfers')->post()->action(
	function($params){
//		\OCP\Util::writeLog('mldonkey', "router Transfers", \OCP\Util::WARN);
		App::main('MLDonkeyController', 'transfers', $params, new DIContainer());
	}
);

$this->create('mldonkey_ajax_getsearches', '/searches')->post()->action(
	function($params){
//		\OCP\Util::writeLog('mldonkey', "router Results", \OCP\Util::WARN);
		App::main('MLDonkeyController', 'searches', $params, new DIContainer());
	}
);

$this->create('mldonkey_ajax_getresults', '/results/{searchid}')->post()->action(
	function($params){
//		\OCP\Util::writeLog('mldonkey', "router Results", \OCP\Util::WARN);
		App::main('MLDonkeyController', 'results', $params, new DIContainer());
	}
);

