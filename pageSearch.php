<link href="/jqueryui/css/blitzer/jquery-ui-1.10.0.custom.css" rel="stylesheet">
<link href="/guiadeconsultorios.css" rel="stylesheet">
<script type="text/javascript" src="/jqueryui/js/jquery-1.9.0.js"></script>
<script type="text/javascript" src="/jqueryui/js/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript" src="/guiadeconsultorios.js"></script>
<script type="text/javascript" src="/shortcut.js"></script>
<script type="text/javascript">
	shortcut.add("enter",function(){
		pesquisaProfissionais();
	});
</script>
<script type="text/javascript">
	$(function() {
		$( "#dialog-link, #icons li" ).hover(
			function() {
				$( this ).addClass( "ui-state-hover" );
			},
			function() {
				$( this ).removeClass( "ui-state-hover" );
			}
		);
	});
</script>
<input id="caixadebusca" type="text" value=""> <a href="#" id="dialog-link" onclick="pesquisaProfissionais()" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-search"></span>Procurar</a>
<div id="resultadosPesquisa"></div>
