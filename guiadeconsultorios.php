<?
/*
 *  Guia de Consultórios
 *  Copyright (C) 2013 @_gurideprograma
 *
 *  Este programa e software livre; voce pode redistribui-lo e/ou
 *  modifica-lo sob os termos da Licenca Publica Geral GNU, conforme
 *  publicada pela Free Software Foundation; tanto a versao 2 da
 *  Licenca como (a seu criterio) qualquer versao mais nova.
 *
 *  Este programa e distribuido na expectativa de ser util, mas SEM
 *  QUALQUER GARANTIA; sem mesmo a garantia implicita de
 *  COMERCIALIZACAO ou de ADEQUACAO A QUALQUER PROPOSITO EM
 *  PARTICULAR. Consulte a Licenca Publica Geral GNU para obter mais
 *  detalhes.
 *
 *  Voce deve ter recebido uma copia da Licenca Publica Geral GNU
 *  junto com este programa; se nao, escreva para a Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA
 *  02111-1307, USA.
 *
 *  Copia da licenca no diretorio licenca/licenca_en.txt
 *                                licenca/licenca_pt.txt
 */
include("wp-config.php");
mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die(mysql_error());
mysql_select_db(DB_NAME) or die(mysql_error());

$termo = mysql_real_escape_string($_POST["termo"]);

$sel = mysql_query("SELECT post_content,post_title,guid,post_status,post_type FROM wcl1np_posts WHERE (post_content LIKE '%$termo%' or post_title LIKE '%$termo%') and post_status = 'publish' and post_type = 'post'") or die(mysql_error());
$numresultados = mysql_num_rows($sel);
if($numresultados == 0){
    echo "<div class=\"ui-widget\" style=\"margin: 30px;\">";
    echo "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 5px;\">";
    echo "<span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: 0.3em;\"></span>";
    echo "Oops! N&atilde;o encontramos nada com estes termos. Por favor, redefina sua busca.";
    echo "</div>";
    echo "</div>";
}else{
    echo "<div class=\"ui-widget\" style=\"margin: 30px;\">";
    echo "<div class=\"ui-state-highlight ui-corner-all\" style=\"padding: 5px;\">";
    echo "<span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: 0.3em;\"></span>";
    echo "Encontramos <b>$numresultados</b> resultados para sua pesquisa:";
    echo "</div>";
    echo "</div>";
    
    while($r = mysql_fetch_array($sel)){
    	$grid = $r["guid"];
    	echo "<h3 onclick=\"window.location.href='$grid'\" style=\"cursor:pointer\">".$r["post_title"]."</h3>";
    	echo substr(strip_tags($r["post_content"]),0,120);
    	echo "... <a href=\"$grid\">Mais informa&ccedil;&otilde;es</a><br><hr><br>";
    }
    
}
