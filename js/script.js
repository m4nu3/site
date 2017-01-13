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


	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
	    modal.style.display = "none";
	}

	// Get all images and insert the clicked image inside the modal
	// Get the content of the image description and insert it inside the modal image caption
	var images = document.getElementsByClassName('only');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	var i;
	for (i = 0; i < images.length; i++) {
	   images[i].onclick = function(){
	       modal.style.display = "block";
	       modalImg.src = this.src;
	       modalImg.alt = this.alt;
	       captionText.innerHTML = this.nextElementSibling.innerHTML;
	   }
	}

});
