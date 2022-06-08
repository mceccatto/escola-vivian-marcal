<?php
class substituiCaracteres {
	
    public $texto;

    function receber() {
		return $this->texto;
	}
	
    function enviar($texto) {
		$antigo = array(
			0 => "/&AMP;/",1 => "/&QUOT;/",2 => "/&LT;/",3 => "/&GT;/",4 => "/&SBQUO;/",5 => "/&LSQUO;/",
			6 => "/&RSQUO;/",7 => "/&LDQUO;/",8 => "/&RDQUO;/",9 => "/&BULL;/",10 => "/&NDASH;/",
			11 => "/&MDASH;/",12 => "/&TILDE;/",13 => "/&ORDF;/",14 => "/&LAQUO;/",15 => "/&DEG;/",
			16 => "/&ACUTE;/",17 => "/&ORDM;/",18 => "/&RAQUO;/",19 => "/&AGRAVE;/",20 => "/&AACUTE;/",
			21 => "/&ACIRC;/",22 => "/&ATILDE;/",23 => "/&AUML;/",24 => "/&ARING;/",25 => "/&CCEDIL;/",
			26 => "/&EGRAVE;/",27 => "/&EACUTE;/",28 => "/&ECIRC;/",29 => "/&EUML;/",30 => "/&IGRAVE;/",
			31 => "/&IACUTE;/",32 => "/&ICIRC;/",33 => "/&IUML;/",34 => "/&NTILDE;/",35 => "/&OGRAVE;/",
			36 => "/&OACUTE;/",37 => "/&OCIRC;/",38 => "/&OTILDE;/",39 => "/&OUML;/",40 => "/&UGRAVE;/",
			41 => "/&UACUTE;/",42 => "/&UCIRC;/",43 => "/&NBSP;/",44 => "/&#39;/",45 => "/&SUP2;/",
			46 => "/&SUP3;/",47 => "/&HELLIP;/",48 => "/&RARR;/",49 => "/&UML;/",50 => "/&FRAC14;/",
			51 => "/&FRAC12;/",52 => "/&FRAC34;/"
		);
		$novo = array(
			0 => "/&",1 => '"',2 => "<",3 => ">",4 => "‚",5 => "‘",6 => "’",7 => "“",8 => "”",9 => "•",10 => "–",
			11 => "—",12 => "~",13 => "ª",14 => "«",15 => "°",16 => "´",17 => "º",18 => "»",19 => "À",20 => "Á",
			21 => "Â",22 => "Ã",23 => "Ä",24 => "Å",25 => "Ç",26 => "È",27 => "É",28 => "Ê",29 => "Ë",30 => "Ì",
			31 => "Í",32 => "Î",33 => "Ï",34 => "Ñ",35 => "Ò",36 => "Ó",37 => "Ô",38 => "Õ",39 => "Ö",40 => "Ù",
			41 => "Ú",42 => "Û",43 => "",44 => "'",45 => "²",46 => "³",47 => "…",48 => "→",49 => "¨",50 => "¼",
			51 => "½",52 => "¾"
		);
		$this->texto = preg_replace($antigo, $novo, $texto);
	}
}
/*
$novoTexto = new substituiCaracteres();
$novoTexto->enviar($conteudo);
echo $novoTexto->receber();
*/
?>