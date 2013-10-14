
$(document).ready(function() {
	"use strict";

	function humanizeSize(size) {
		var prefixes = "TGMK ";
		while (size >= 1024 && prefixes !== '') {
			size = Math.round(size/1024);
			prefixes = prefixes.slice(0,-1);
		}
		return size+" "+prefixes.slice(-1)+"bytes";
	}

	function keys(obj) {
		return $.map(obj, function(v,k) { return k;}).join(", ");
	}

	$('#mldonkey_tabs').tabs({
//		 event: "mouseover",
		});


	var tableTemplate = {
		mtype: "POST",
		datatype: "json",
		autowidth: true,
		gridview: true, // Optimizing data insertion
		viewrecords: true, // Show shown records summary
		loadonce: true, // Work with remote data locally
		sortable: true, // Column reorder
		height: '100%',
//		viewsortcols: true, // Show cols that can be sorted (not working?)
//		hiddengrid: true, // Initially title collapsed
//		multiselect: true,
		jsonReader: {
			cell: '',
			id: '0',
			root: 'data',
			page: function(obj) {return 1;},
			total: function(obj) {return 1;},
			records: function(obj) { return obj.data.length; },
			},
		loadError : function(xhr,st,err) {
			alert (
//			$("#rsperror").html(
				"Ajax Error\nType: "+st+";\nResponse: "+ xhr.status + " "+xhr.statusText+"\n"+this.id
				);
			},
	};


	$("#mldonkey_searches_grid").jqGrid($.extend({},tableTemplate, {
		caption:"Searches",
		url:'searches',
		pager: $('#mldonkey_searches_pager'),
		colModel:[
			{label: 'ID', name:'id', width: '40', key: true, },
			{label: 'Status', name: 'status', width: '30', align: 'center',
				formatter: function(val) {
					return {
						0: "<i class='icon-spinner icon-spin' title='Searching''></i>",
						1: "<i class='icon-ok' title='Finished'></i>",
						2: "<i class='icon-exclamation-sign' title='Error'></i>",
						}[val] ||
							"<i class='icon-question-sign' title='Unknown'></i>";
					},
				},
			{label: 'Network', name: 'network', },
			{label: 'Keywords', name: 'keywords', },
			{label: 'Results', name: 'nresults', },
			],

		onSelectRow: function(id){
			var searches = $('#mldonkey_searches_grid');
			if (id == null) id=0;
			if (searches.jqGrid('getGridParam','records') ==0 ) return;

			var results = $('#mldonkey_results_grid');
			results.jqGrid('setGridParam',{
				url: "results/"+id,
				datatype: 'json', // loadonce sets it to local
				});
			results.trigger('reloadGrid');
			results.jqGrid('setCaption',
				"Search results for search "+id);
			},
		}));

	$("#mldonkey_results_grid").jqGrid($.extend({}, tableTemplate, {
		caption: 'Search results',
		url:'results/boo',
		pager: $('#mldonkey_results_pager'),
		colModel:[
			{label: 'ID', name: 'id',
				key: true,
				},
			{label: 'Status', name: 'status',
				formatter: function(val, options, object) {
					return {
						0 : "To be downloaded",
						1 : "Downloading",
						2 : "Downloaded",
						}[val] || "Unknown";
					}
				},
			{label: 'Network', name: 'network'},
			{label: 'File name', name: 'filename'},
			{label: 'Peers', name: 'peers', width:40},
			{label: 'Complete', name: 'complete', width:40},
			{label: 'Size', name: 'size',
				formatter: function(val, options, object) {
					return humanizeSize(val)
					},
				sorttype: function(val,row) {
					return row.size;
					},
				},
			],
		}));
	$("#mldonkey_results_grid")
		.jqGrid('navGrid', '#mldonkey_results_pager',
			{edit:false,add:false,del:true})

	$("#mldonkey_transfers_grid").jqGrid($.extend({},tableTemplate, {
		caption:"Ongoing File Transfers",
		url:'transfers',
		pager: $('#mldonkey_transfers_pager'),
		multiselect: true,
		colModel:[
			{label: 'CRC', name:'id',
				width:55,
				hidden: true,
				key: true,
				},
			{label: 'File name', name:'filename', width:200, }, // TODO: Edit it
			{label: 'Progress', name:'progress',
				width: 200, align: 'right',
				sorttype: function(val,row) {return row.progress;},
				formatter: function(val, options, obj) {
					return '<meter style="width:100%" max="100" value="'
						+val+'">'+val+'</meter>';
					},
				},
			{label:'Peers', name:'peers', width:90, align:'right',
				formatter:'int', sorttype:'int'},
			{label:'Size', name:'size', width:90, align:'right',
				formatter: function(val) { return humanizeSize(val) },
				sorttype: function(val,row) { return row.size; },
				},
			{label:'Actions', name:'actions',
				fixed:true,
				formatoptions:{keys:true},
				sortable: false,
				formatter: 'actions',
				},
			],
		}));

	$("#mldonkey_transfers_grid")
		.jqGrid('navGrid', '#mldonkey_transfers_pager',
			{edit:false,add:false,del:true})
		.navButtonAdd('#mldonkey_transfers_pager',{
			title: 'Pause selected transfers',
			caption: '',
			buttonicon:"ui-icon-pause", 
			onClickButton: function() {
				var gr = $("#mldonkey_transfers_grid").jqGrid('getGridParam','selrow');
				if (gr == null) return alert("Select a transfer to pause");
				alert("Pausing transfer "+gr);
			}, 
			position:"first"
		});

} );



