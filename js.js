$(function() //validation pseudo
	{
		$("#form_pseudo").submit(function()
		{
			pseudo = $(this).find("input[name=pseudo]").val();
			$.post("ajax/setPseudo.php",{pseudo:pseudo},function(data)
				{
					//$("#erreur").empty().append(data);
					if(data == "erreur")
						alert('Veuillez saisir un pseudo.');
					else
					{
						$("#form_pseudo").empty().append(data);
						$("#btn-salle").fadeIn("slow");
						location.reload();
					}
				});
				return false;
		});
	});
	
	
$(function()
	{
		$("#text_chat").submit(function()
		{
			com = $(this).find("textarea[name=com]").val();
			$.post("ajax/insertComAjax.php",{com:com},function(data)
				{
					if(data =="erreur")
						return;
					else
					{
						$("#chat").append(data).fadeIn("slow");;
					$("#textarea").val("");
					AutoRefresh();
					}
				});
				return false;
		});
	});
	
function AfficherCommentaires()
{
	$(function()
	{
		$.post("ajax/rafraichirComAjax.php",{},function(data)
		{
			$("#chat").empty().append(data);
		});
	});
}

$("#textarea").keypress(function(e) {
    if(e.which == 13) {
         $('#text_chat').submit();
		 $("#textarea").val("");
    return false;    
    }
});

function AutoRefresh(){
     $.post("ajax/rafraichirComAjax.php",{},function(data)
		{
			
			$("#chat").empty().append(data);
			
		});
}

//setInterval(AutoRefresh, 100);

function toggle(div)
{
	$(div).fadeIn("slow");
	return false;
}


$(function()
	{
		$("#creer_salle").submit(function()
		{
			nom = $(this).find("input[name=nom]").val();
			pass = $(this).find("input[name=mdp]").val();
			$.post("ajax/creerSalle.php",{nom:nom, pass:pass},function(data)
				{
					if(data =="erreur")
					{
						alert('Une salle porte déjà ce nom.');
					}
					else
					{
						alert("Salle créé, vous pouvez vous maintenant la rejoindre.");
						// var res = data.split(".");
						// $('#titre_salle').empty().append(res[1])
					// $('#liste_salle').append("<a href='?id="+res[0]+"'>"+res[1]+"</a></br>");
					// setInterval(AutoRefresh, 100);
					}
				});
				return false;
		});
	});
	
$(function()
	{
		$("#rejoindre_salle").submit(function()
		{
			code = $(this).find("input[name=code]").val();
			pass = $(this).find("input[name=mdp]").val();
			$.post("ajax/rejoindreSalle.php",{code:code, pass:pass},function(data)
				{
					if(data =="erreur")
					{
						alert('Salle ou mot de passe invalide.');
					}
					else if(data =="dejapresent")
					{
						alert('Vous êtes déjà inscrit dans cette salle.');
					}
					else
					{
						var res = data.split(".");
						$('#titre_salle').empty().append(res[1])
					setInterval(AutoRefresh, 100);
					}
				});
				return false;
		});
	});
	
	
	
	
	
	
	
	
	
