<?php
/******************************************************************************
 *
 * Subrion - open source content management system
 * Copyright (C) 2017 Intelliants, LLC <https://intelliants.com>
 *
 * This file is part of Subrion.
 *
 * Subrion is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Subrion is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Subrion. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @link https://subrion.org/
 *
 ******************************************************************************/

if (iaView::REQUEST_HTML == $iaView->getRequestType())
{
	if ($onlineMembers = $iaCore->factory('users')->getVisitorsInfo())
	{
		foreach ($onlineMembers as &$entry)
		{
			$userName = $entry['username'];
			$ip = long2ip($entry['ip']);
			$entry = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=89fe0a129bbdd51694b0dd3997f7db74139ed3124771ba2f2104d392e6cf29ad&ip={$ip}&format=json"), true);
			$entry['username'] = $userName;
		}
	}

	$iaView->assign('onlineMembers', $onlineMembers);
}