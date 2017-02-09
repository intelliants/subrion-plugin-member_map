{if isset($onlineMembers) && $onlineMembers}
	<div class="widget widget-large" id="widget-website-visits">
		<div class="widget-header"><i class="i-users"></i> {lang key='online_members_map'}
			<ul class="nav nav-pills pull-right">
				<li><a href="#" class="widget-toggle"><i class="i-chevron-up"></i></a></li>
			</ul>
		</div>
		<div class="widget-content">
			<div id="map-canvas" style="width: 100%; height:260px"></div>
		</div>
	</div>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDbz0xfgjrFJjceGiGXtE4_JKX9buZGyOU&sensor=false"></script>
	{ia_add_media files='js:_IA_URL_plugins/member_map/js/admin/index'}

{ia_add_js}
	var membersList = [];
	{foreach $onlineMembers as $onlineMember}
		membersList.push(['{$onlineMember.latitude}', '{$onlineMember.longitude}', '{$onlineMember.username}', '{$onlineMember.ipAddress}', '{$onlineMember.countryName}', '{$onlineMember.cityName}']);
	{/foreach}
{/ia_add_js}

{/if}