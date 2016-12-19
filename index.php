<?php
// Couleur du texte des champs si erreur saisie utilisateur
$color_font_warn="#FF0000";
// Couleur de fond des champs si erreur saisie utilisateur
$color_form_warn="#FFCC66";
// Ne rien modifier ci-dessous si vous n’êtes pas certain de ce que vous faites !
if(isset($_POST['submit'])){
	$erreur="";
	// Nettoyage des entrées
	while(list($var,$val)=each($_POST)){
	if(!is_array($val)){
		$$var=strip_tags($val);
	}else{
		while(list($arvar,$arval)=each($val)){
				$$var[$arvar]=strip_tags($arval);
			}
		}
	}
	// Formatage des entrées
	$f_1=trim(ucwords(eregi_replace("[^a-zA-Z0-9éèàäö\ -]", "", $f_1)));
	$f_2=trim(ucwords(eregi_replace("[^a-zA-Z0-9éèàäö\ -]", "", $f_2)));
	$f_3=trim(ucwords(eregi_replace("[^a-zA-Z0-9éèàäö\ -]", "", $f_3)));
	$f_4=strip_tags(trim($f_4));
	$f_5=trim(eregi_replace("[^0-9\ +]", "", $f_5));
	// Verification des champs
	if(strlen($f_1)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Nom &raquo; est vide ou incomplet.</span>";
		$errf_1=1;
	}
	if(strlen($f_2)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Prénom &raquo; est vide ou incomplet.</span>";
		$errf_2=1;
	}
	if(strlen($f_4)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Email &raquo; est vide ou incomplet.</span>";
		$errf_4=1;
	}else{
		if(!ereg('^[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+'.
		'@'.
		'[-!#$%&\'*+\/0-9=?A-Z^_`a-z{|}~]+\.'.
		'[-!#$%&\'*+\./0-9=?A-Z^_`a-z{|}~]+$',
		$f_4)){
			$erreur.="<li><span class='txterror'>La syntaxe de votre adresse e-mail n'est pas correcte.</span>";
			$errf_4=1;
		}
	}
	if(strlen($f_6)<2){
		$erreur.="<li><span class='txterror'>Le champ &laquo; Message &raquo; est vide ou incomplet.</span>";
		$errf_6=1;
	}
	if($erreur==""){
		// Création du message
		$titre="Message de votre site";
		$tete="From:contact@manueweb.fr\n";
		$corps.="Nom : ".$f_1."\n";
		$corps.="Prénom : ".$f_2."\n";
		$corps.="Société : ".$f_3."\n";
		$corps.="Email : ".$f_4."\n";
		$corps.="Telephone : ".$f_5."\n";
		$corps.="Message : ".$f_6."\n";
		if(mail("emmanuelle.courty@yahoo.fr", $titre, stripslashes($corps), $tete)){
			$ok_mail="true";
		}else{
			$erreur.="<li><span class='txterror'>Une erreur est survenue lors de l'envoi du message, veuillez refaire une tentative.</span>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<title>Manue Web designer integrator  developer</title>
		<meta name="description" content="Web Developer, Web Integrator, Web Designer, Paris. Création de sites web. HTML, CSS, JS/JQ/Ajax, PHP/SQL, POO, MVC. Photoshop, Illustrator, InDesign.">
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" href="css/style.css">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>

	<body>

		<header>
			<nav>
				<ul>
					<li><a href="#btnHome" class="btn">Home</a></li>
					<li><a href="#btnWork" class="btn">Work</a></li>
					<li><a href="#btnCV" class="btn">CV</a></li>
					<li><a href="#btnBlog" class="btn">Blog</a></li>
					<li><a href="#btnContact" class="btn">Contact</a></li>			
				</ul>
				<!-- <i class="fa fa-bars" aria-hidden="true"></i> -->
			</nav>
			<h1>Manue Web <span>Designer Integrator Developer</span></h1>
			<h4>Paris</h4>
		</header>

		<main>

			<!-- DEBUT des blocs de contenu. -->
			<section id="btnHome" class="bloc_contenu">
				<h2>What ?! Who ?!</h2>
				<div class="description">
					<figure> <img src="img/couv.png" alt="" /></figure>
					<hr>
				</div>
				<div class="content">
					<p class="welcome">Bienvenue sur mon site ! Alors c'est quoi un <cite>"Designer Integrator Developer"</cite> au juste ?!
					 Ce sont trois métiers différents mais intimement liés dans le processus de création d'un site internet fonctionnel.</p>
					 
					<p class="job"><dd class="def">Le designer (aka graphiste)</dd> <dt>Il s'occupe du concept visuel du site en se basant sur l'identité visuelle du client et sur le cahier des charges établi en amont avec celui-ci. Le designer va concevoir la maquette graphique du site, c'est-à-dire à quoi il va ressembler. A ce stade, les pages ne sont encore que des images.</dt>			
					</p>

					<p class="job"><dd class="def">L'intégrateur</dd> <dt>Il va établir une maquette fonctionnelle du futur site en se basant sur la maquette visuelle du designer. Il veille également à la qualité du site, dans le respect des normes d’accessibilité, de référencement et d’ergonomie. Cette nouvelle étape va permettre d'avoir un rendu réel du site dans un navigateur.</dt>
					</p>

					<p class="job"><dd class="def">Le développeur web</dd> <dt>Analyse les besoins, choisit la solution technique la mieux adaptée et développe les fonctionnalités techniques du site en adoptant les bons procédés de codage en vigueur. Il finit par tester et valider ces nouvelles fonctionnalités programmées avant de mettre le site en ligne et d'effectuer la livraison au client.</dt>	
					</p>

					<p class="who"><dd class="def">Et enfin, c'est quoi une <cite>"Manue"</cite> ?</dd> <dt>Bah c'est moi ! Emmanuelle, 34 ans, localisée en région parisienne. Designer/graphiste depuis 8 ans, intégratrice et développeuse web depuis moins d'un an, j'exerce aujourd'hui ces trois casquettes dans le monde du numérique. Du simple logo au site complet, je mets mes compétences au service des autres afin de mener leur projet à bien !</dt>			
					</p>
					
				</div>
			</section>

			<section id="btnWork" class="bloc_contenu">
				<h2>Work</h2>
				<div class="description">
				<div class="content">
					<h5>Design Graphic</h5>
					
					 <div><a class="square" href="graph/agenda.jpg" target="_blank">
					 <img alt="" title="Illustration" src="graph/agenda200.jpg">
					 <span class="bandeautxt">Illustration Agenda</span></a> 

					 <a class="square" href="graph/chorée.jpg" target="_blank">
					 <img alt="" title="Illustration" src="graph/chorée200.jpg">
					 <span class="bandeautxt">Illustration Danse Bûto</span></a> 

					 <a class="square" href="graph/louvre.jpg" target="_blank">
					 <img alt="" title="Montage" src="graph/louvre200.jpg">
					 <span class="bandeautxt">Sac Musée Louvre</span></a>

					 <a class="square" href="graph/screamingjh.jpg" target="_blank">
					 <img alt="" title="Illustration" src="graph/screamingjh200.jpg">
					 <span class="bandeautxt">Illustration Jay Hawkins</span></a></div>

					 <div><a class="square" href="graph/mvt.jpg" target="_blank">
					 <img alt="" title="Illustration" src="graph/mvt200.jpg">
					 <span class="bandeautxt">Illustration Le Mouvement</span></a>

					 <a class="square" href="graph/jay.jpg" target="_blank">
					 <img alt="" title="Illustration" src="graph/jay200.jpg">
					 <span class="bandeautxt">Illustration Jay Hawkins</span></a>

					 <a class="square" href="graph/haring.jpg" target="_blank">
					 <img alt="" title="Identité" src="graph/haring200.jpg">
					 <span class="bandeautxt">Identité Keith Haring</span></a>

					 <a class="square" href="graph/durex.jpg" target="_blank">
					 <img alt="" title="Identité" src="graph/durex200.jpg">
					 <span class="bandeautxt">Identité Marque Durex</span></a></div>

					<h5>Photographie</h5>
					<div>
					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157631813249620" target="_blank">
					<img alt="" title="Museum" src="img/potame.jpg">
					<span class="bandeautxt">Museum Histoire Naturelle</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157623068695618" target="_blank">
					<img alt="" title="Venus Robotica" src="img/robot.jpg">
					<span class="bandeautxt">Expostion Venus Robotica</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157625040373980" target="_blank">
					<img alt="" title="Salon du Vintage" src="img/vintage.jpg">
					<span class="bandeautxt">Salon du Vintage</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157622434471752" target="_blank">
					<img alt="" title="Salon du Tatouage" src="img/tatouage.jpg">
					<span class="bandeautxt">Salon du Tatouage</span></a></div>

					<div><a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157622365132557" target="_blank">
					<img alt="" title="Concert Peter Murphy" src="img/peter.jpg">
					<span class="bandeautxt">Concert Peter Murphy</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157625347662571" target="_blank">
					<img alt="" title="Concert Foals" src="img/foals.jpg">
					<span class="bandeautxt">Concert Foals</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157626335943786" target="_blank">
					<img alt="" title="Concert No One Is Innocent" src="img/innocent.jpg">
					<span class="bandeautxt">Concert No One Is Innocent</span></a>

					<a class="square" title="Album" href="https://www.flickr.com/photos/m4nue/albums/72157626925131133" target="_blank">
					<img alt="" title="Concert Kid Loco" src="img/kidloco.jpg">
					<span class="bandeautxt">Concert Kid Loco</span></a></div>

				</div>
			</section>

			<section id="btnCV" class="bloc_contenu">
				<h2>Emmanuelle COURTY</h2>
				<blockquote>Café et bonne humeur ! <br>Je travaille aussi bien sous Mac que Windows, seule ou en équipe, été comme hiver.</blockquote>
				<aside>
					<a href="http://www.linkedin.com/in/emmanuelle-92300">
					<strong class="name">Linkedin</strong>
					<i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
					<a href="rsc/ECourty.pdf"><strong>Télécharger mon CV au format PDF</strong></a>			
				</aside>
				<div class="content">
					<div class="col left">
						<article>
							<h5>Compétences</h5>
							<p class="pdesc" id="competences">...validation W3C, responsive design, versionning Git/GitHub, programmation orientée objet, architecture MVC, web design, bootstrap, CMS wordpress, introduction au framework symfony, cachier des charges, relation et brief client, positionnement marketing, identité visuelle, charte graphique, règles typographiques, signalétique...
							</p>
						</article>

						<article class="langages">
							<h5>Langages et logiciels</h5>
							<p class="pdesc">HTML5, CSS3,<br> Javascript, JQuery, Ajax,<br> PHP, SQL,<br> Photoshop, Illustrator, InDesign</p> 
						</article>

						<article class="formation">
							<h5>Formations</h5>

							<h6>2016  Développeur/Intégrateur web</h6>
							<p class="pdesc">WebForce3 – Paris</p>

							<h6>2008/2011  Communication Visuelle & Design Graphique</h6>
							<p class="pdesc">Itecom – Paris</p>

							<h6>2007  Prépa Multimédia</h6>
							<p class="pdesc">Itecom – Paris</p>

							<h6>2001 Baccalauréat Littéraire</h6>
							<p class="pdesc">Lycée Eugène Delacroix – Drancy</p>
						</article>

						<article class="langues">
							<h5>Langues</h5>
							<p class="pdesc">Français (langue maternelle)<br>Anglais (courant)<br>Espagnol et Italien (notions)</p>
						</article>

						<article class="hobbies">
							<h5>Hobbies</h5>
							<p class="pdesc">Aide ponctuelle aux associations de protection des animaux. Bandes dessinées. Blog perso. <br>Photographie argentique/numérique.</p>
						</article>
					</div>	
						<article class="col experience">
						<h5>Expérience professionnelle</h5>
						<ul>
							<li><h6>Sept 2014 à Mai 2016 : Graphiste</h6></li>
							<p class="ptitle">Missions freelance – France</p>
							<ul class="pdesc">
								<li>04/2015 à 05/2016 : Administration des services communautaires privés du site franco-belge [paranoïaque]. Création artistique et communication pour l’animation des membres et le développement des services.</li><hr>
								<li>01/2015 à 03/2015 : Communication externe MC Foods et habillage personnalisé du stand pour le SIAL de Lyon (Salon International de l’Alimentation).</li><hr>
								<li>09/2014 à 12/2014 : Renfort exécutif divers pour l’agence My Cup of Tea.</li>
							</ul>

							<li><h6>Mars 2012 à Août 2014 : Graphiste</h6></li> 
							<p class="ptitle">Family Deal – Levallois</p>
							<p class="pdesc">Amélioration du design et de l’ergonomie du site family-deal.com. Conception d’éléments web et illustrations numériques. Community management. Rédaction, correction et mise en page de contenu web. Retouches photo.</p>

							<li><h6>Nov 2009 à Jan 2011 : Graphiste</h6></li>
							<p class="ptitle">Galeries Lafayette – Paris</p>
							<p class="pdesc">Service signalétique et visual merchandising. Elaboration des stratégies de communication envers la clientèle (travaux, nouveaux espaces, zones de pub prioritaires, implantations des nouvelles marques...)</p>

							<li><h6>Mars 2008 à Mai 2008 : Community manager</h6></li>
							<p class="ptitle">Lycos France – Paris</p>
							<p class="pdesc">Contrôle et modération des contenus, animation et gestion des services communautaires, analyses, compte-rendus et audit du développement des services.</p>

							<li><h6>Sept 2005 à Déc 2008 : Secrétaire/hôtesse/standardiste</h6></li>
							<p class="ptitle">Six Telekurs – Paris</p>
							<p class="pdesc">Accueil physique, gestion des fax et des appels téléphoniques français et anglais, secrétariat administratif, gestion des bases de données, services généraux.</p>

							<li><h6>Avril 2003 à Août 2005 : Intérimaire administratif</h6></li>
							<p class="ptitle">Manpower – Paris</p>
							<ul class="pdesc">
								<li>Missions : hôtesse/standardiste, secrétaire administrative, secrétaire de direction.</li>
								<hr>
								<li>Sociétés : AS.FO.NE.CO, Imprimerie Nationale de France, Chaîne TV Histoire, Experian, CPH Immobilier, Fininfo – Six Telekurs</li>
							</ul>

							<li><h6>Nov 2001 à Fév 2003 : Chargée de clientèle</h6></li>
							<p class="ptitle">Teleperformance – Paris</p>
							<p class="pdesc">Services Commercial, Réclamation et Résiliation. Back-up Expertise/Qualité des pôles technique et commercial.</p>
						</article>
					</div>	
			</section>		

			<section id="btnBlog" class="bloc_contenu">
				<h2>Blog</h2>
				<div class="description">
					<p>Coming soon...</p>
				</div>
				<div class="content">
					<p>...mon blog !</p>
				</div>
			</section>

			<section id="btnContact" class="bloc_contenu">
				<h2>Me contacter</h2>
				<div class="content">
				<? if($ok_mail=="true"){ ?>
					<table width='100%' border='0' cellspacing='1' cellpadding='1'>
						<tr><td><span class='txtform'>Le message a bien été transmis !</span></td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td><tt><?echo nl2br(stripslashes($corps));?></tt></td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><td><span class='txtform'>Je vous répondrai dans les meilleurs délais. A bientôt !</span></td></tr>
					</table>
				<? }else{ ?>
				<form action='<? echo $PHP_SELF ?>' method='post' name='Form'>
				<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<? if($erreur){ ?><tr><td colspan='2' bgcolor='red'><span class='txterror'><font color='white'><b>&nbsp;ERREUR, votre message n'a pas été transmis</b></font></span></td></tr><tr><td colspan='2'><ul><?echo$erreur?></ul></td></tr><?}?>
				
				<tr><td align='right'><span class='txtform'>Nom* :</span></td>
				<td><input type='text' style='<?if($errf_1==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_1' value='<?echo stripslashes($f_1);?>'></td></tr>

				<tr><td align='right'><span class='txtform'>Prénom* :</span></td>
				<td><input type='text' style='<?if($errf_2==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_2' value='<?echo stripslashes($f_2);?>' size='30' border='0'></td></tr>

				<tr><td align='right'><span class='txtform'>Société :</span></td>
				<td><input type='text' style='<?if($errf_3==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_3' value='<?echo stripslashes($f_3);?>' size='24' border='0'></td></tr>

				<tr><td align='right'><span class='txtform'>Email* :</span></td>
				<td><input type='text' style='<?if($errf_4==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_4' value='<?echo stripslashes($f_4);?>' size='24' border='0'></td></tr>

				<tr><td align='right'><span class='txtform'>Téléphone :</span></td>
				<td><input type='text' style='<?if($errf_5==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_5' value='<?echo stripslashes($f_5);?>' size='24' border='0'></td></tr>

				<tr><td align='right'><span class='txtform'>Message* :</span></td>
				<td><textarea style='<?if($errf_6==1){print("; background-color: ".$color_form_warn."; color: ".$color_font_warn);}?>;' name='f_6' rows='6' cols='40'><?echo$f_6?></textarea></td></tr>

				<tr><td colspan='2'><span class='txterror' style='color: white'><i>* Champs obligatoires</i></span></td></tr>

				<tr><td align='right'></td><td><input type='submit' name='submit' value='Envoyer' border='0'></td></tr>
				
				</table>
				</form>
				<? } ?>
				</div>
			</section>
		</main>

		<footer>
		DWTFYWWI Public License
		</footer>
		
		<!-- Intégrer le CDN jQuery -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

		<!-- Intégrer le script de la page APRES le CDN jQuery -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>