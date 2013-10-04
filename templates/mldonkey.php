{{ script('app') }}
{{ style('style') }}
{{ style('font-awesome','3rdparty/fontawesome') }}

<div id='app'>

<span class='error'>
No way!
</span>


<h1>Search</h1>
<form>
	<input style='width: 50%' name='query' placeholder='Type search keywords or a link (e2k, torrent...)' >
	<input type='submit' />
</form>


<h1>Search Results</h1>

<div id='mldonkey-results'>
<table width='100%'>
<tr><th>Kind</th><th>Query</th><th>Results</th></tr>
<tr><td><i title='Ongoing' class='icon-cog'></i> Donkey</td><td>starwars</td><td>34</td></tr>
<tr><td><i title='Finished' class='icon-ok'></i> Donkey</td><td>sobrinus</td><td>144</td></tr>
<tr><td><i title='Error' class='icon-exclamation-sign'></i> Donkey</td><td>a weird thing</td><td>532</td></tr>
<tr><td><i title='Done' class='icon-ok'></i> Donkey</td><td>dr who</td><td>552</td></tr>
</table>
</div>

<h1>Transfers</h1>

<div id='mldonkey-transfers'>
<table width='100%'>
<tr><th>Filename</th><th>Progress</th><th>Peers</th><th>Size</th></tr>
</table>
</div>

<h1>Shares</h1>
<div id='mldonkey-results'>

<table width='100%'>
<tr>
<th>Status</th><th>Kind</th><th>Query</th><th>Results</th>
</tr>
</table>
</div>



</div>

