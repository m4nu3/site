/*
// Attendre le chargement du DOM
$(document).ready(function (){

	// Variables globales
	var introPage = $("#introPage");
	var contentPage = $("#contentPage");

	// Création du type d'objet Page (constructeur)
	function PageType(titleParam, descriptionParam, contentParam){
		this.title = titleParam;
		this.description = descriptionParam;
		this.content = contentParam;
	};


	// Créer une fonction pour afficher le bon contenu
	function showPages(btn, object){
		// Capter l'évènement click sur le lien "Projet"
		$(btn).click(function(event){

			// Bloquer le comportement naturel de la balise 
			event.preventDefault();
			console.log(object);

			// Modifier le contenu HTML d'une balise
			introPage.html(object.title + object.description);
			contentPage.html(object.content);

		});
	};

	// Créer un tableau d'objet pour le contenu des deux pages (projet/contact)
	var myContent = [
		{
			title: "<h2>Home</h2>",
			description: "<p>HOME - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>",
			content: '<p>HOME CONTENT- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p><figcaption>Gnagnagna</figcaption> </figure> <figure> <img src="img/couv.png" alt="" /></figure>'
		},

		{
			title: "<h2>Work</h2>",
			description: "<p>WORK - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>",
			content: '<p>CONTENT WORK - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>'
		},

		{
			title: "<h2>CV</h2>",
			description: "<p>CV - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>",
			content: '<p>CONTENT CV - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>'
		},
		{
			title: "<h2>Blog</h2>",
			description: "<p>BLOG - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>",
			content: '<p>CONTENT BLOG - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem consectetur quia necessitatibus, impedit sed obcaecati dolore recusandae cumque! Recusandae omnis, ipsam dolorum vel nulla non blanditiis mollitia quibusdam natus deserunt.</p>'
		}

		
	];

	// Faire une boucle for sur le tableau de données
	for( var i = 0; i < myContent.length; i++){

		// Créer des objets selon la valeur de la variable i
		if ( i == 0) {
			var pageHome = new PageType(myContent[i].title, myContent[i].description, myContent[i].content);

		} else if ( i == 1) {
			var pageWork = new PageType(myContent[i].title, myContent[i].description, myContent[i].content);

		} else if ( i == 2) {
			var pageCV = new PageType(myContent[i].title, myContent[i].description, myContent[i].content);

		} else {
			var pageBlog = new PageType(myContent[i].title, myContent[i].description, myContent[i].content);

		} 
	};

	// Initier la page avec le contenu de la page projet
	introPage.html(pageHome.title + pageHome.description);
	contentPage.html(pageHome.content);

	// Appeler la fonction pour afficher le bon contenu
	showPages("#btnHome", pageHome);
	showPages("#btnWork", pageWork);
	showPages("#btnCV", pageCV);
	showPages("#btnBlog", pageBlog);


}); // Fin de la fonction de chargement du DOM

*/
//~ #### RAJOUTS LECTEUR #### 

// Attendre le chargement du DOM
$(document).ready(function (){
	/*
		Le JS va uniquement gérer l'affichage / le masquage des blocs de contenus 
		Il devra pouvoir afficher un contenu précis dans deux cas de figures :
			- CAS 1 : lorque l'utilisateur va cliquer sur une élement du menu
			- CAS 2 : lorsque la page se recharge (exemple : envoi du formulaire de contact)
	*/

	//~ Au chargement de la page, on vérifie la valeur de l'ancre dans l'URL pour déterminer un éventuel CAS2
	var hash = getMyHashBabby(window.location.href);

	if(hash !== ""){
		//~ Il y a bien une ancre dans l'URL, on traite donc comme un CAS 2v
		var cible = $('#'+hash);
		showThisPage(cible);
	}

	//~ Et puis on traite le CAS 1 parce que bon voilà
	$('nav .btn').click(function(){
		//~ On détermine le contenu qu'on veut afficher en traitant le contenu de l'ance spécifiée en HREF
		var str_href = $(this).attr('href');
		var hash = getMyHashBabby(str_href);

		if(hash !== ""){
			//~ Il y a bien une ancre dans l'URL, on traite donc comme un CAS 2v
			var cible = $('#'+hash);
			showThisPage(cible);
		}

		//~ on met à jour l'URL pour faire classe
		window.location.hash = hash;
		return false; //~ C'est pouf
	});

	//~ Aucun cas traité, on affiche donc la home par défaut
	if(!$('section.bloc_contenu').filter(':visible').length){
		showThisPage($('#btnHome'));
	}

	/*
	* Affiche un bloc HTML associé à une page
	* et puis cache avant les éventuels blocs affichés parce que merde
	**/
	function showThisPage($cible){
		if($cible && $cible.length){	//~ simplement pour vérifier, par principe, que la cible existe
			//~ On masque tous les éventuels contenus actuellement visible avant d'afficher celui demandé
			$('section.bloc_contenu').filter(':visible').hide();

			//~ On affiche en fondu (pour faire joli <3) le contenu qu'on désire
			$cible.fadeIn('slow');
			//~ Et pouf on scroll en haut 
			$('html, body').animate({
			scrollTop: 0
			});
		}
	}

	/*
	* A partir d'une URL fournie, permet de déterminer la 
	* valeur du hash (ancre)
	**/
	function getMyHashBabby(url){
		var idx = url.indexOf("#")
		return idx != -1 ? url.substring(idx+1) : "";
	}


});