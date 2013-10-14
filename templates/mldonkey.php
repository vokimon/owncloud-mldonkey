{{ script('app') }}
{{ style('style') }}
{{ style('font-awesome','3rdparty/fontawesome') }}
{{ style('../3rdparty/jquery.jqGrid-4.5.4/css/ui.jqgrid') }}
{{ script('../3rdparty/jquery.jqGrid-4.5.4/js/jquery.jqGrid.src') }}
{{ script('../3rdparty/jquery.jqGrid-4.5.4/js/i18n/grid.locale-en') }}

<div id='app'>
<div class="content">

<div id='rsperror'></div>
<div id='jgriderrors'></div>

<div id='mldonkey_tabs'>

<ul>
<li><a href='#mldonkey_searchform'>Search Launcher</a></li>
<li><a href='#mldonkey_transfers'>Transfers</a></li>
<li><a href='#mldonkey_searches'>Search results</a></li>
</ul>

<div id='mldonkey_transfers'>
<table id='mldonkey_transfers_grid'  style='width:100%'>
</table>
<div id='mldonkey_transfers_pager'> </div>
</div> <!-- mldonkey_dummy -->


<div id='mldonkey_searchform'>
<form action='results/2' method='post' >
	<input id='search-query' name='search-query'
		placeholder='Search keywords, ed2k links, torrent links, urls...'/ >
	<input type='submit' />
</form>
</div><!-- mldonkey_searchform -->

<div id='mldonkey_searches'>
<table id='mldonkey_searches_grid' style='width:100%'></table>
<div id='mldonkey_searches_pager'> </div>

<table id='mldonkey_results_grid' style='width:100%'></table>
<div id='mldonkey_results_pager'> </div>

</div> <!-- mldonkey_searches -->


</div> <!-- mldonkey_tabs -->

</div> <!-- content -->
</div> <!-- app -->

